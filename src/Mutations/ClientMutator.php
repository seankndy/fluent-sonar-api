<?php

namespace SeanKndy\SonarApi\Mutations;

use SeanKndy\SonarApi\Client;

class ClientMutator
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function run(MutationInterface $mutation)
    {
        $response = $this->client->mutate($mutation);

        if ($mutation->returnResource()) {
            return ($mutation->returnResource())::fromJsonObject($response->{$mutation->name()});
        }

        return $response;
    }
}