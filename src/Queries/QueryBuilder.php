<?php

namespace SeanKndy\SonarApi\Queries;

use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Queries\Search\Search;
use SeanKndy\SonarApi\Resources\Reflection\Reflection;
use SeanKndy\SonarApi\Resources\ResourceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class QueryBuilder
{
    /**
     * The resource class this QueryBuilder is for.
     */
    private string $resource;
    /**
     * The GraphQL query entity name.
     */
    private string $objectName;
    /**
     * Relations to include.
     */
    private array $with = [];
    /**
     * Only select these fields.
     */
    private array $only = [];
    /**
     * If this query will return an array of resources.
     */
    private bool $many = true;
    /**
     * If a QueryBuilder
     */
    private ?self $parentQueryBuilder;
    /**
     * Sorting field.
     */
    private ?string $sortBy = null;
    /**
     * Sorting direction.
     */
    private string $sortOrder = 'ASC';
    /**
     * Search criteria.
     */
    private ?Search $search = null;
    /**
     * Should we paginate?
     */
    private bool $paginate = false;
    /**
     * Current pagination page.
     */
    private int $paginateCurrentPage;
    /**
     * Results per page.
     */
    private int $paginatePerPage;
    /**
     * Variables declared for the root QueryBuilder.
     * Only the root QueryBuilder should have this populated.
     */
    private array $declaredVariables = [];
    /**
     * $this->resource's fields (properties) and types gotten via Reflection.
     */
    private array $resourceFieldsAndTypes;
    /**
     * Sonar API Client, Client is required if the user code wants to call get(), first() or paginate().
     */
    private ?Client $client = null;

    public function __construct(
        string $resourceClass,
        string $objectName
    ) {
        if (!is_a($resourceClass, ResourceInterface::class, true)) {
            throw new \InvalidArgumentException("\$resourceClass must implement ".ResourceInterface::class);
        }

        $this->resource = $resourceClass;
        $this->resourceFieldsAndTypes = Reflection::getResourceProperties($this->resource);
        $this->objectName = $objectName;
        $this->with((new $resourceClass())->with());
    }

    /**
     * Execute the query return result(s).
     *
     * @return ResourceInterface|Collection<int, ResourceInterface>|null
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
     */
    public function get()
    {
        if (!$this->client) {
            throw new \Exception("Cannot call get() without a client!");
        }

        $response = $this->client->query($this->getQuery());

        if (!$this->many) {
            return $response->{$this->objectName}
                ? ($this->resource)::fromJsonObject($response->{$this->objectName})
                : null;
        }
        return collect($response->{$this->objectName}->entities)
            ->map(fn($entity) => ($this->resource)::fromJsonObject($entity));
    }

    /**
     * Shortcut for getting first item from set of results.
     *
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
     * @throws \Exception
     */
    public function first()
    {
        if (!$this->many) {
            throw new \Exception("first() cannot be called because of singular query.");
        }
        return $this->get()->first();
    }

    /**
     * Get and paginate the results.  Pagination is done server-side with Sonar's GraphQL paginator.
     *
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
     */
    public function paginate(int $perPage = 25, int $currentPage = 1, string $path = '/'): LengthAwarePaginator
    {
        if (!$this->many) {
            throw new \Exception("paginate() cannot be called because of singular query.");
        }

        $queryBuilder = clone $this;
        $queryBuilder->paginate = true;
        $queryBuilder->paginatePerPage = $perPage;
        $queryBuilder->paginateCurrentPage = $currentPage;

        $response = $queryBuilder->client->query($this->getQuery());
        $pageInfo = $response->{$this->objectName}->page_info;
        $entities = collect($response->{$this->objectName}->entities)
            ->map(fn($entity) => ($this->resource)::fromJsonObject($entity));

        return new LengthAwarePaginator($entities, $pageInfo->total_count, $perPage, $currentPage, [
            'path' => $path,
        ]);
    }

    public function setClient(Client $client): self
    {
        $queryBuilder = clone $this;
        $queryBuilder->client = $client;

        return $queryBuilder;
    }

    /**
     * Set if this query will return an array of resources.
     */
    public function many(bool $many): self
    {
        $queryBuilder = clone $this;
        $queryBuilder->many = $many;

        return $queryBuilder;
    }

    /**
     * Specify relations to include in query.  You may pass array with key being relation and value a closure which
     * receives a QueryBuilder instance for the relation.
     */
    public function with(...$args): self
    {
        $queryBuilder = clone $this;

        foreach ($args as $arg) {
            if (!is_array($arg)) {
                $arg = [$arg => 0];
            }

            foreach ($arg as $relation => $closure) {
                if (is_int($relation)) {
                    $relation = $closure;
                    $closure = 0;
                }

                if (!isset($this->resourceFieldsAndTypes[$relation])
                    || !$this->resourceFieldsAndTypes[$relation]->isResource()) {
                    throw new \InvalidArgumentException("Relation specified ($relation) is not a valid resource.");
                }

                $relationQueryBuilder = (new self(
                    $this->resourceFieldsAndTypes[$relation]->type(),
                    Str::snake($relation),
                    false
                ))->many($this->resourceFieldsAndTypes[$relation]->arrayOf());

                if (is_callable($closure)) {
                    $relationQueryBuilder = $closure($relationQueryBuilder);
                }

                $queryBuilder->with[$relation] = $relationQueryBuilder;
            }
        }

        return $queryBuilder;
    }

    /**
     * Set sorting field and optionally direction.
     */
    public function sortBy(string $sortBy, string $sortOrder = 'ASC'): self
    {
        $queryBuilder = clone $this;

        $queryBuilder->sortBy = Str::snake($sortBy);
        return $queryBuilder->sortOrder($sortOrder);
    }

    /**
     * Set sorting direction.
     */
    public function sortOrder(string $sortOrder): self
    {
        $queryBuilder = clone $this;

        $queryBuilder->sortOrder = \strtoupper($sortOrder);

        return $queryBuilder;
    }

    /**
     * Limit the fields returned by query to only these fields.
     */
    public function only(...$args): self
    {
        $queryBuilder = clone $this;

        foreach ($args as $arg) {
            if (!is_array($arg)) {
                $arg = [$arg];
            }

            foreach ($arg as $field) {
                if (!in_array($field, $this->only)) {
                    $queryBuilder->only[] = $field;
                }
            }
        }

        return $queryBuilder;
    }

    /**
     * Specify a search filter criteria.
     */
    public function where(string $field, ...$args): self
    {
        $queryBuilder = clone $this;

        if (!$queryBuilder->search) {
            $queryBuilder->search = new Search();
        }

        $queryBuilder->search = $queryBuilder->search->where(Str::snake($field), ...$args);

        return $queryBuilder;
    }

    /**
     * Specify an OR search filter criteria.
     */
    public function orWhere(string $field, ...$args): self
    {
        $queryBuilder = clone $this;

        if (!$queryBuilder->search) {
            $queryBuilder->search = new Search();
        }

        $queryBuilder->search = $queryBuilder->search->orWhere(Str::snake($field), ...$args);

        return $this;
    }

    /**
     * Get Query instance suitable for execution by Client.
     */
    public function getQuery(bool $root = true): Query
    {
        $queryBuilder = new \GraphQL\QueryBuilder\QueryBuilder($this->objectName);

        $variables = [];
        $manySelectionSet = [];

        foreach ($this->resourceFieldsAndTypes as $field => $type) {
            if ($this->only && !\in_array($field, $this->only)) {
                continue;
            }

            if ($type->isResource()) {
                if (!isset($this->with[$field])) {
                    continue;
                }

                $relationQuery = $this->with[$field]->getQuery(false);
                $select = $relationQuery->query();
                $variables = \array_merge($variables, $relationQuery->variables());
            } else {
                $select = Str::snake($field);
            }

            if ($this->many) {
                $manySelectionSet[] = $select;
            } else {
                $queryBuilder->selectField($select);
            }
        }

        if ($manySelectionSet) {
            $queryBuilder->selectField(
                (new \GraphQL\Query('entities'))->setSelectionSet($manySelectionSet)
            );
        }

        if ($this->search) {
            $queryBuilder->setArgument('search', '$'.$this->getGraphQueryVariableName('search'));

            $variables[$this->objectName.'_search'] = $this->search->toArray();
        }
        if ($this->sortBy) {
            $queryBuilder->setArgument('sorter', ['$'.$this->getGraphQueryVariableName('sorter')]);

            $variables[$this->objectName.'_sorter'] = [
                'attribute' => $this->sortBy,
                'direction' => $this->sortOrder,
            ];
        }
        if ($this->paginate) {
            $queryBuilder
                ->setArgument('paginator', '$'.$this->getGraphQueryVariableName('paginator'))
                ->selectField(
                    (new \GraphQL\Query('page_info'))
                    ->setSelectionSet([
                        'records_per_page',
                        'page',
                        'total_count',
                    ])
                );

            $variables[$this->objectName.'_paginator'] = [
                'page' => $this->paginateCurrentPage,
                'records_per_page' => $this->paginatePerPage,
            ];
        }

        if ($root) {
            foreach ($this->graphQueryVariableDeclarations() as $variableDeclaration) {
                $queryBuilder->setVariable(...$variableDeclaration);
            }
        }

        return new Query($queryBuilder->getQuery(), $variables);
    }

    /**
     * Return the variable declarations for this query builder.  This is used by getQuery() to
     * compile a list of variable declarations across all levels of builders and then apply to
     * the root query builder as that is where variable declarations reside in GraphQL.
     */
    public function graphQueryVariableDeclarations(array $carry = []): array
    {
        $variables = $carry;

        if ($this->search) {
            $variables[] = [$this->getGraphQueryVariableName('search'), '[Search]'];
        }
        if ($this->sortBy) {
            $variables[] = [$this->getGraphQueryVariableName('sorter'), 'Sorter'];
        }
        if ($this->paginate) {
            $variables[] = [$this->getGraphQueryVariableName('paginator'), 'Paginator'];
        }
        foreach ($this->with as $relationQueryBuilder) {
            $variables = \array_merge($variables, $relationQueryBuilder->graphQueryVariableDeclarations());
        }

        return $variables;
    }

    public function __clone()
    {
        if ($this->search) {
            $this->search = clone $this->search;
        }
    }

    public function getResource(): string
    {
        return $this->resource;
    }

    public function getObjectName(): string
    {
        return $this->objectName;
    }

    private function getGraphQueryVariableName(string $variable): string
    {
        return $this->objectName.'_'.$variable;
    }
}