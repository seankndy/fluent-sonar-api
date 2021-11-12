<?php

namespace SeanKndy\SonarApi;

use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
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
        $this->url = \rtrim($url, '/');
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
        $response = $this->request(
            'POST',
            'api/graphql',
            [
                'http_errors' => true,
                'json' => [
                    'query' => (string)$query->query(),
                    'variables' => $query->variables(),
                ],
            ]
        );

        $jsonObject = \json_decode($response->getBody()->getContents(), false);

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

    /**
     * Make an HTTP request to Sonar, return ResponseInterface.
     *
     * @throws SonarHttpException
     */
    public function request(
        string $method,
        string $endpoint,
        array $options = []
    ): ResponseInterface {
        $options['headers'] = \array_merge([
            'Authorization' => 'Bearer '.$this->apiKey,
            'Accept' => 'application/json',
        ], $options['headers'] ?? []);

        try {
            return $this->httpClient->request(
                $method,
                sprintf('%s/%s', $this->url, $endpoint),
                $options
            );
        } catch (\Throwable $e) {
            throw new SonarHttpException("Failed to make HTTP request to Sonar's API: " . $e->getMessage());
        }
    }

    /**
     * Get instance of file manager.
     */
    public function fileManager(): FileManager
    {
        return new FileManager($this);
    }
}

