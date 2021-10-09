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
use SeanKndy\SonarApi\Resources\Account;
use SeanKndy\SonarApi\Resources\Company;
use SeanKndy\SonarApi\Resources\Contact;
use SeanKndy\SonarApi\Resources\Job;
use SeanKndy\SonarApi\Resources\JobType;
use SeanKndy\SonarApi\Resources\NetworkSite;
use SeanKndy\SonarApi\Resources\Service;
use SeanKndy\SonarApi\Resources\Ticket;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use SeanKndy\SonarApi\Resources\User;

class Client
{
    private GuzzleClientInterface $httpClient;

    private string $apiKey;

    private string $url;

    private array $rootQueryBuilders = [];

    public function __construct(
        GuzzleClientInterface $httpClient,
        string $apiKey,
        string $url,
        array $rootQueryBuilders = []
    ) {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
        $this->url = $url;
        $this->rootQueryBuilders = \array_merge([
            'companies' => Company::class,
            'accounts' => Account::class,
            'tickets' => Ticket::class,
            'contacts' => Contact::class,
            'networkSites' => NetworkSite::class,
            'jobs' => Job::class,
            'jobTypes' => JobType::class,
            'services' => Service::class,
            'users' => User::class,
        ], $rootQueryBuilders);
    }

    public function __call(string $name, array $args)
    {
        if (isset($this->rootQueryBuilders[$name])) {
            return new QueryBuilder(
                $this->rootQueryBuilders[$name],
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
}
