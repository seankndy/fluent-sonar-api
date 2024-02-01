<?php

namespace SeanKndy\SonarApi\Mutations;

class Mutation implements MutationInterface
{
    private \GraphQL\Mutation $mutation;

    private array $variables;

    private float $timeout;

    public function __construct(\GraphQL\Mutation $mutation, array $variables, float $timeout = 60)
    {
        $this->mutation = $mutation;
        $this->variables = $variables;
        $this->timeout = $timeout;
    }

    public function query(): \GraphQL\Mutation
    {
        return $this->mutation;
    }

    public function variables(): array
    {
        return $this->variables;
    }

    public function timeout(): float
    {
        return $this->timeout;
    }
}