<?php

namespace SeanKndy\SonarApi;

use Illuminate\Support\Str;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
use SeanKndy\SonarApi\Mutations\ClientMutator;
use SeanKndy\SonarApi\Mutations\MutationBuilder;
use SeanKndy\SonarApi\Mutations\MutationInterface;
use SeanKndy\SonarApi\Queries\QueryInterface;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Exceptions\SonarHttpException;
use SeanKndy\SonarApi\Exceptions\SonarQueryException;
use SeanKndy\SonarApi\Resources\ResourceInterface;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;

class Client
{
    private GuzzleClientInterface $httpClient;

    private string $apiKey;

    private string $url;

    private array $queryBuilders = [];

    public function __construct(
        GuzzleClientInterface $httpClient,
        string $apiKey,
        string $url,
        array $queryBuilders = []
    ) {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
        $this->url = $url;
        $this->queryBuilders = $queryBuilders;
    }

    public function __call(string $name, array $args)
    {
        if (isset($this->queryBuilders[$name])) {
            $class = $this->queryBuilders[$name];
        } else {
            $resourcesNamespace = '\\SeanKndy\\SonarApi\\Resources';
            $class = $resourcesNamespace . '\\' . Str::studly(Str::singular($name));
        }

        if (\class_exists($class) && \is_a($class, ResourceInterface::class, true)) {
            return new QueryBuilder(
                $class,
                Str::snake($name),
                $this
            );
        }

        throw new \Error('Call to undefined method '.self::class.'::'.$name.'()');
    }

    /**
     * @codeCoverageIgnore
     */
    public function mutations(): MutationBuilder
    {
        return new MutationBuilder($this);
    }

    /**
     * @return mixed
     * @throws SonarHttpException
     * @throws SonarQueryException
     * @throws SonarFormatException
     */
    public function query(QueryInterface $query)
    {
        try {
            $response = $this->httpClient->request(
                'POST',
                sprintf('%s/api/graphql', $this->url),
                [
                    'http_errors' => true,
                    'headers' => [
                        'Authorization' => 'Bearer '.$this->apiKey,
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'query' => (string)$query->query(),
                        'variables' => $query->variables(),
                    ]
                ]
            );

            $jsonObject = \json_decode($response->getBody()->getContents(), false);
        } catch (\Exception $e) {
            throw new SonarHttpException("Failed to POST to Sonar's GraphQL API: " . $e->getMessage());
        }

        if (isset($jsonObject->errors) && $jsonObject->errors) {
            throw new SonarQueryException("Query returned errors.", $jsonObject->errors);
        }

        if (!isset($jsonObject->data)) {
            throw new SonarFormatException('Unknown API response formatting.');
        }

        return $jsonObject->data;
    }

    /**
     * @throws SonarHttpException
     * @throws SonarQueryException
     * @return mixed
     * @codeCoverageIgnore
     */
    public function mutate(MutationInterface $mutation)
    {
        return $this->query($mutation);
    }

    /**
     * @param class-string $resourceClass
     */
    public function newQuery(string $resourceClass): QueryBuilder
    {
        if (! \is_a($resourceClass, ResourceInterface::class, true)) {
            throw new \InvalidArgumentException($resourceClass . " is not a " . ResourceInterface::class);
        }

        $name = Str::snake(
            (new \ReflectionClass($resourceClass))->getShortName()
        );

        return new QueryBuilder(
            $resourceClass,
            $name,
            $this
        );
    }
}

