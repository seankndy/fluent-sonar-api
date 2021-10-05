<?php

namespace SeanKndy\SonarApi\Queries;

class Query implements QueryInterface
{
    private \GraphQL\Query $query;

    private array $variables;

    public function __construct(\GraphQL\Query $query, array $variables)
    {
        $this->query = $query;
        $this->variables = $variables;
    }

    public function query(): \GraphQL\Query
    {
        return $this->query;
    }

    public function variables(): array
    {
        return $this->variables;
    }
}