<?php

namespace SeanKndy\SonarApi\Mutations;

class Mutation implements MutationInterface
{
    private \GraphQL\Mutation $mutation;

    private array $variables;

    public function __construct(\GraphQL\Mutation $mutation, array $variables)
    {
        $this->mutation = $mutation;
        $this->variables = $variables;
    }

    public function query(): \GraphQL\Mutation
    {
        return $this->mutation;
    }

    public function variables(): array
    {
        return $this->variables;
    }
}