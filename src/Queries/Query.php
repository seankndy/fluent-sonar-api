<?php

namespace SeanKndy\SonarApi\Queries;

class Query implements QueryInterface
{
    private \GraphQL\Query $query;

    private array $variables;

    private float $timeout;

    public function __construct(\GraphQL\Query $query, array $variables, float $timeout = 60)
    {
        $this->query = $query;
        $this->variables = $variables;
        $this->timeout = $timeout;
    }

    public function query(): \GraphQL\Query
    {
        return $this->query;
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