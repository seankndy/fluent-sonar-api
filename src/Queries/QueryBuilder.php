<?php

namespace SeanKndy\SonarApi\Queries;

use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Queries\Search\Search;
use SeanKndy\SonarApi\Reflection\Reflection;
use SeanKndy\SonarApi\Resources\RelationableResourceInterface;
use SeanKndy\SonarApi\Resources\ResourceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/** @psalm-suppress PropertyNotSetInConstructor */
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
    /**
     * Reverse relation filters (whereHas() searches)
     */
    private array $reverseRelationFilters = [];
    /**
     * Specifies the current RRF group.  Incremented every orWhereHas() call.
     */
    private int $currentReverseRelationFilterGroup = 1;

    public function __construct(
        string $resourceClass,
        string $objectName,
        ?Client $client = null,
        self $parentQueryBuilder = null
    ) {
        if (!is_a($resourceClass, ResourceInterface::class, true)) {
            throw new \InvalidArgumentException("$resourceClass must implement ".ResourceInterface::class);
        }

        $this->resource = $resourceClass;
        $this->resourceFieldsAndTypes = Reflection::getPropertiesAndTypes($this->resource);
        $this->objectName = $objectName;
        $this->client = $client;
        $this->parentQueryBuilder = $parentQueryBuilder;
    }

    /**
     * Execute the query return result(s).
     *
     * @return ResourceInterface|Collection|null
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
     * @throws \Exception
     */
    public function get()
    {
        if (! $this->client) {
            throw new \Exception("Cannot call get() without a client!");
        }

        $response = $this->client->query($this->getQuery());

        if ($this->many) {
            return ($this->resource)::fromJsonObject($response->{$this->objectName}->entities);
        }

        return !empty($response->{$this->objectName})
            ? ($this->resource)::fromJsonObject($response->{$this->objectName})
            : null;
    }

    /**
     * Shortcut for getting first item from set of results.
     *
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
     * @throws \Exception
     */
    public function first(): ?ResourceInterface
    {
        if (! $this->many) {
            throw new \Exception("first() cannot be called because of singular query.");
        }

        /** @psalm-suppress PossiblyNullReference, PossiblyUndefinedMethod */
        return $this->get()->first();
    }

    /**
     * Get and paginate the results.  Pagination is done server-side with Sonar's GraphQL paginator.
     *
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
     * @throws \Exception
     */
    public function paginate(int $perPage = 25, int $currentPage = 1, string $path = '/'): LengthAwarePaginator
    {
        $queryBuilder = clone $this;

        if (! $queryBuilder->client) {
            throw new \RuntimeException("Cannot call paginate() without a client!");
        }
        if (! $queryBuilder->many) {
            throw new \RuntimeException("paginate() cannot be called because of singular query.");
        }

        $queryBuilder->paginate = true;
        $queryBuilder->paginatePerPage = $perPage;
        $queryBuilder->paginateCurrentPage = $currentPage;

        $response = $queryBuilder->client->query($queryBuilder->getQuery());
        $pageInfo = $response->{$this->objectName}->page_info;
        $entities = collect($response->{$this->objectName}->entities)
            ->map(fn(object $entity): ResourceInterface => ($this->resource)::fromJsonObject($entity));

        return new LengthAwarePaginator($entities, $pageInfo->total_count, $perPage, $currentPage, [
            'path' => $path,
        ]);
    }

    public function withClient(Client $client): self
    {
        $queryBuilder = clone $this;
        $queryBuilder->client = $client;

        return $queryBuilder;
    }

    /**
     * Set if this query will return an array of resources.
     */
    public function withMany(bool $many): self
    {
        $queryBuilder = clone $this;
        $queryBuilder->many = $many;

        return $queryBuilder;
    }

    /**
     * Specify relations to include in query.  You may pass array with key being relation and value a closure which
     * receives a QueryBuilder instance for the relation.
     * @param mixed ...$args
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

                $queryBuilder->with[$relation] = $closure;
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
        $queryBuilder->sortOrder = \strtoupper($sortOrder);

        return $queryBuilder;
    }

    /**
     * Limit the fields returned by query to only these fields.
     * @param mixed ...$args
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
     * @param mixed ...$args
     */
    public function where(string $field, ...$args): self
    {
        $queryBuilder = clone $this;

        if (! $queryBuilder->search) {
            $queryBuilder->search = new Search();
        }

        $queryBuilder->search = $queryBuilder->search->where($field, ...$args);

        return $queryBuilder;
    }

    /**
     * Specify an OR search filter criteria.
     * @param mixed ...$args
     * @throws \Exception
     */
    public function orWhere(string $field, ...$args): self
    {
        $queryBuilder = clone $this;

        if (! $queryBuilder->search) {
            throw new \Exception("Cannot call orWhere() before where()!");
        }

        $queryBuilder->search = $queryBuilder->search->orWhere($field, ...$args);

        return $queryBuilder;
    }

    /**
     * Specify a relation search filter that affects the parent results.
     */
    public function whereHas(string $relation, callable $searchCallable = null): self
    {
        $queryBuilder = clone $this;

        $search = new Search();
        if ($searchCallable) {
            $search = $searchCallable($search);
        }
        $queryBuilder->reverseRelationFilters[] = new ReverseRelationFilter(
            $relation,
            $search,
            (string)$this->currentReverseRelationFilterGroup,
            $searchCallable === null ? false : null
        );

        return $queryBuilder;
    }

    /**
     * Specify a relation search filter that affects the parent results ORed from other RRFs.
     */
    public function orWhereHas(string $relation, callable $searchCallable = null): self
    {
        $queryBuilder = clone $this;

        if (! $this->reverseRelationFilters) {
            throw new \RuntimeException("Cannot call orWhereHas() before a whereHas()!");
        }

        $queryBuilder->currentReverseRelationFilterGroup++;

        return $queryBuilder->whereHas($relation, $searchCallable);
    }

    /**
     * Filter current objects based on absence of related object(s).
     */
    public function whereNotHas(string $relation): self
    {
        $queryBuilder = clone $this;

        $queryBuilder->reverseRelationFilters[] = new ReverseRelationFilter(
            $relation,
            new Search(),
            (string)$this->currentReverseRelationFilterGroup,
            true
        );

        return $queryBuilder;
    }

    /**
     * Filter current objects based on absence of related object(s), ORed with other RRFs.
     */
    public function orWhereNotHas(string $relation): self
    {
        $queryBuilder = clone $this;

        if (! $this->reverseRelationFilters) {
            throw new \RuntimeException("Cannot call orWhereNotHas() before a whereHas()!");
        }

        $queryBuilder->currentReverseRelationFilterGroup++;

        return $queryBuilder->whereNotHas($relation);
    }

    /**
     * Get Query instance suitable for execution by Client.
     */
    public function getQuery(): Query
    {
        if (\is_a($this->resource, RelationableResourceInterface::class, true)) {
            $queryBuilder = $this->with($this->resource::with());
        } else {
            $queryBuilder = clone $this;
        }

        $graphQueryBuilder = new \GraphQL\QueryBuilder\QueryBuilder($queryBuilder->objectName);

        $variables = [];
        $manySelectionSet = [];

        foreach ($queryBuilder->resourceFieldsAndTypes as $field => $type) {
            if ($queryBuilder->only && !\in_array($field, $queryBuilder->only)) {
                continue;
            }

            if ($type->isResource()) {
                if (!isset($queryBuilder->with[$field])) {
                    continue;
                }

                $relationQueryBuilder = (new self(
                    $type->type(),
                    Str::snake($field),
                    null,
                    $queryBuilder
                ))->withMany($type->arrayOf());

                if (\is_callable($queryBuilder->with[$field])) {
                    $relationQueryBuilder = ($queryBuilder->with[$field])($relationQueryBuilder);
                }

                $relationQuery = $relationQueryBuilder->getQuery();
                $select = $relationQuery->query();
                $variables = \array_merge($variables, $relationQuery->variables());
            } else {
                $select = Str::snake($field);
            }

            if ($queryBuilder->many) {
                $manySelectionSet[] = $select;
            } else {
                $graphQueryBuilder->selectField($select);
            }
        }

        if ($manySelectionSet) {
            $graphQueryBuilder->selectField(
                (new \GraphQL\Query('entities'))->setSelectionSet($manySelectionSet)
            );
        }

        if ($queryBuilder->search) {
            $queryBuilder->declareVariable($this->getGraphQueryVariableName('search'), '[Search]');

            $graphQueryBuilder->setArgument('search', '$'.$queryBuilder->getGraphQueryVariableName('search'));

            $variables[$queryBuilder->objectName.'_search'] = $queryBuilder->search->toArray();
        }
        if ($queryBuilder->reverseRelationFilters) {
            $queryBuilder->declareVariable($queryBuilder->objectName.'_rrf', '[ReverseRelationFilter]');

            $graphQueryBuilder->setArgument('reverse_relation_filters', '$'.$queryBuilder->objectName.'_rrf');

            $variables[$queryBuilder->objectName.'_rrf'] = \array_map(
                fn(ReverseRelationFilter $rrf): array => $rrf->toArray(),
                $queryBuilder->reverseRelationFilters
            );
        }
        if ($queryBuilder->sortBy) {
            $queryBuilder->declareVariable($this->getGraphQueryVariableName('sorter'), 'Sorter');

            $graphQueryBuilder->setArgument('sorter', ['$'.$queryBuilder->getGraphQueryVariableName('sorter')]);

            $variables[$queryBuilder->objectName.'_sorter'] = [
                'attribute' => $queryBuilder->sortBy,
                'direction' => $queryBuilder->sortOrder,
            ];
        }
        if ($queryBuilder->paginate) {
            $queryBuilder->declareVariable($this->getGraphQueryVariableName('paginator'), 'Paginator');

            $graphQueryBuilder
                ->setArgument('paginator', '$'.$queryBuilder->getGraphQueryVariableName('paginator'));
            $graphQueryBuilder
                ->selectField(
                    (new \GraphQL\Query('page_info'))
                    ->setSelectionSet([
                        'records_per_page',
                        'page',
                        'total_count',
                    ])
                );

            $variables[$queryBuilder->objectName.'_paginator'] = [
                'page' => $queryBuilder->paginateCurrentPage,
                'records_per_page' => $queryBuilder->paginatePerPage,
            ];
        }

        if ($queryBuilder->isRoot()) {
            foreach ($queryBuilder->declaredVariables as $declaredVariable) {
                $graphQueryBuilder->setVariable(...$declaredVariable);
            }
        }

        return new Query($graphQueryBuilder->getQuery(), $variables);
    }

    /**
     * @codeCoverageIgnore
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getObjectName(): string
    {
        return $this->objectName;
    }

    /**
     * Declare variable on the root query builder as that is where variable declarations belong in GraphQL.
     * @param mixed $defaultValue
     */
    private function declareVariable(string $name, string $type, bool $isRequired = false, $defaultValue = null): void
    {
        if ($this->parentQueryBuilder) {
            $this->getRootQueryBuilder()->declareVariable($name, $type, $isRequired, $defaultValue);
        } else {
            $this->declaredVariables[] = [$name, $type, $isRequired, $defaultValue];
        }
    }

    private function getRootQueryBuilder(): self
    {
        if ($this->parentQueryBuilder === null) {
            return $this;
        }

        return $this->parentQueryBuilder->getRootQueryBuilder();
    }

    private function isRoot(): bool
    {
        return $this->parentQueryBuilder === null;
    }

    private function getGraphQueryVariableName(string $variable): string
    {
        return $this->objectName.'_'.$variable;
    }
}