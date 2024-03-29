<?php

namespace SeanKndy\SonarApi\Tests\Queries;

use Illuminate\Support\Collection;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Resources\BaseResource;
use SeanKndy\SonarApi\Resources\ResourceInterface;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;
use SeanKndy\SonarApi\Tests\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use SeanKndy\SonarApi\Client;

class QueryBuilderTest extends TestCase
{
    /** @test */
    public function it_throws_exception_if_instantiated_without_resource_class(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('foo must implement '.ResourceInterface::class);

        new QueryBuilder('foo', 'foos');
    }

    /** @test */
    public function it_throws_exception_if_called_without_client_set_on_query_builder(): void
    {
        $this->expectException(\Exception::class);
        $this->expectDeprecationMessage('Cannot call get() without a client!');

        (new QueryBuilder(DummyResource::class, 'dummies', null))
            ->get();
    }

    /** @test */
    public function it_returns_singular_response_object_when_many_not_true(): void
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'dummy' => [
                            'name' => 'Testing',
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $data = (new QueryBuilder(DummyResource::class, 'dummy', $client))
            ->withMany(false)
            ->get();

        $this->assertInstanceOf(DummyResource::class, $data);
    }

    /** @test */
    public function it_returns_collection_when_many_is_true(): void
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'dummies' => [
                            'entities' => [
                                ['name' => 'Testing'],
                            ],
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $data = (new QueryBuilder(DummyResource::class, 'dummies', $client))
            ->withMany(true)
            ->get();

        $this->assertInstanceOf(Collection::class, $data);
        $this->assertInstanceOf(DummyResource::class, $data->first());
    }

    /** @test */
    public function it_throws_exception_if_first_called_without_many_being_true(): void
    {
        $this->expectException(\Exception::class);
        $this->expectDeprecationMessage('first() cannot be called because of singular query.');

        (new QueryBuilder(DummyResource::class, 'dummies', null))
            ->withMany(false)
            ->first();
    }

    /** @test */
    public function it_calls_first_method_on_response_collection(): void
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'dummies' => [
                            'entities' => [
                                ['name' => 'Testing 1'],
                                ['name' => 'Testing 2'],
                            ],
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $resource = (new QueryBuilder(DummyResource::class, 'dummies', $client))
            ->withMany(true)
            ->first();

        $this->assertInstanceOf(DummyResource::class, $resource);
        $this->assertSame('Testing 1', $resource->name);
    }

    /** @test */
    public function it_throws_exception_if_paginate_called_without_a_client_set(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectDeprecationMessage("Cannot call paginate() without a client!");

        (new QueryBuilder(DummyResource::class, 'dummies', null))
            ->withMany(true)
            ->paginate();
    }

    /** @test */
    public function it_throws_exception_if_paginate_called_without_many_being_true(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectDeprecationMessage('paginate() cannot be called because of singular query.');

        (new QueryBuilder(DummyResource::class, 'dummies', $this->createMock(Client::class)))
            ->withMany(false)
            ->paginate();
    }

    /** @test */
    public function it_does_return_paginator_with_good_values()
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'dummies' => [
                            'page_info' => [
                                'records_per_page' => 2,
                                'page' => 3,
                                'total_count' => 6,
                            ],
                            'entities' => [
                                ['name' => 'Testing 5'],
                                ['name' => 'Testing 6'],
                            ],
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $paginator = (new QueryBuilder(DummyResource::class, 'dummies', $client))
            ->paginate(2, 3, 'https://test.local/some/path');

        $this->assertEquals(3, $paginator->currentPage());
        $this->assertEquals(6, $paginator->total());
        $this->assertEquals(2, $paginator->perPage());
        $this->assertEquals('https://test.local/some/path', $paginator->toArray()['path']);
        $data = $paginator->toArray()['data'];
        $this->assertInstanceOf(DummyResource::class, $data[0]);
        $this->assertInstanceOf(DummyResource::class, $data[1]);
        $this->assertEquals('Testing 5', $data[0]->name);
        $this->assertEquals('Testing 6', $data[1]->name);
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_with_client()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'test_token',
            'https://dummy.com'
        );

        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies', $client);
        $queryBuilder2 = $queryBuilder1->withClient($client);

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_with_many()
    {
        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies');
        $queryBuilder2 = $queryBuilder1->withMany(true);

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_with()
    {
        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies');
        $queryBuilder2 = $queryBuilder1->with('anotherDummyResource');

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    /** @test */
    public function it_does_load_default_relations_on_resource()
    {
        $queryBuilder = new QueryBuilder(DummyResourceThatHasADefaultWith::class, 'dummies');

        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'entities' => [
                'dummy_resource' => [
                    'id',
                    'name',
                    'some_date_time',
                ],
            ]
        ], $selections);
    }

    /** @test */
    public function it_does_load_default_relations_and_applies_nested_closures_on_a_resource()
    {
        $queryBuilder = new QueryBuilder(DummyResourceThatHasADefaultWithThatHasNestedWith::class, 'dummies');

        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'entities' => [
                'dummy_resource' => [
                    'id',
                    'name',
                    'some_date_time',
                    'another_dummy_resource' => [ // nested with from a closure should be here
                        'name',
                    ]
                ],
            ]
        ], $selections);
    }

    /** @test */
    public function it_does_allow_string_or_array_arguments_when_calling_with()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->with('anotherDummyResource');

        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'entities' => [
                'id',
                'name',
                'some_date_time',
                'another_dummy_resource' => [
                    'name'
                ],
            ]
        ], $selections);

        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->with(['anotherDummyResource' => fn($q) => $q]);

        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'entities' => [
                'id',
                'name',
                'some_date_time',
                'another_dummy_resource' => [
                    'name'
                ],
            ]
        ], $selections);

        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->with(['anotherDummyResource']);

        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'entities' => [
                'id',
                'name',
                'some_date_time',
                'another_dummy_resource' => [
                    'name'
                ],
            ]
        ], $selections);
    }

    /** @test */
    public function it_throws_exception_when_specifying_invalid_relation_when_calling_with(): void
    {
        $this->expectException(\Exception::class);
        $this->expectDeprecationMessage('Relation specified (name) is not a valid resource.');

        (new QueryBuilder(DummyResource::class, 'dummies', null))
            ->with('name'); // not a resource
    }

    /** @test */
    public function it_throws_exception_when_specifying_nonexistent_field_when_calling_with(): void
    {
        $this->expectException(\Exception::class);
        $this->expectDeprecationMessage('Relation specified (someInvalidField) is not a valid resource.');

        (new QueryBuilder(DummyResource::class, 'dummies', null))
            ->with('someInvalidField');
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_sortBy()
    {
        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies');
        $queryBuilder2 = $queryBuilder1->sortBy('name', 'DESC');

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    /** @test */
    public function it_does_sort_when_calling_sortBy()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->sortBy('name', 'DESC');

        $queryString = (string)$queryBuilder->getQuery()->query();
        $variables = $queryBuilder->getQuery()->variables();

        $this->assertMatchesRegularExpression('/^query\(\$dummies_sorter: Sorter\) \{[\s\r\n]+dummies\(sorter: \[\$dummies_sorter\]\) {/i', $queryString);
        $this->assertEqualsCanonicalizing([
            'dummies_sorter' => [
                'attribute' => 'name',
                'direction' => 'DESC',
            ],
        ], $variables);
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_only()
    {
        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies');
        $queryBuilder2 = $queryBuilder1->only('id');

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    /** @test */
    public function it_does_limit_fields_when_calling_only()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->only('id');

        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());

        $this->assertEqualsCanonicalizing([
            'entities' => [
                'id',
            ]
        ], $selections);
    }

    /** @test */
    public function it_does_allow_string_and_array_arguments_when_calling_only()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->only('id');
        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'entities' => [
                'id',
            ]
        ], $selections);

        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->only(['id']);
        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'entities' => [
                'id',
            ]
        ], $selections);
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_where()
    {
        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies');
        $queryBuilder2 = $queryBuilder1->where('id', 1);

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    /** @test */
    public function it_does_a_search_filter_when_calling_where()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->where('id', 1);

        $queryString = (string)$queryBuilder->getQuery()->query();
        $variables = $queryBuilder->getQuery()->variables();

        $this->assertMatchesRegularExpression('/^query\(\$dummies_search: \[Search\]\) \{[\s\r\n]+dummies\(search: \$dummies_search\) {/i', $queryString);
        $this->assertEqualsCanonicalizing([
            'dummies_search' => [
                [
                    'integer_fields' => [
                        [
                            'attribute' => 'id',
                            'operator' => 'EQ',
                            'search_value' => 1,
                        ],
                    ],
                ],
            ],
        ], $variables);
    }

    /** @test */
    public function it_supports_operator_argument_when_calling_where()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->where('id', '!=', 1);

        $queryString = (string)$queryBuilder->getQuery()->query();
        $variables = $queryBuilder->getQuery()->variables();

        $this->assertMatchesRegularExpression('/^query\(\$dummies_search: \[Search\]\) \{[\s\r\n]+dummies\(search: \$dummies_search\) {/i', $queryString);
        $this->assertEqualsCanonicalizing([
            'dummies_search' => [
                [
                    'integer_fields' => [
                        [
                            'attribute' => 'id',
                            'operator' => 'NEQ',
                            'search_value' => 1,
                        ],
                    ],
                ],
            ],
        ], $variables);
    }

    /** @test */
    public function it_does_throw_exception_when_calling_orWhere_before_where()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Cannot call orWhere() before where()!');

        (new QueryBuilder(DummyResource::class, 'dummies'))
            ->orWhere('id', 1);
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_orWhere()
    {
        $queryBuilder1 = (new QueryBuilder(DummyResource::class, 'dummies'))->where('id', 1);
        $queryBuilder2 = $queryBuilder1->orWhere('id', 2);

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    public function it_does_a_search_filter_when_calling_orWhere()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->where('id', 1)
            ->orWhere('id', 2);

        $queryString = (string)$queryBuilder->getQuery()->query();
        $variables = $queryBuilder->getQuery()->variables();

        $this->assertMatchesRegularExpression('/^query\(\$dummies_search: \[Search\]\) \{[\s\r\n]+dummies\(search: \$dummies_search\) {/i', $queryString);
        $this->assertEqualsCanonicalizing([
            'dummies_search' => [
                [
                    'integer_fields' => [
                        [
                            'attribute' => 'id',
                            'operator' => 'EQ',
                            'search_value' => 1,
                        ],
                        [
                            'attribute' => 'id',
                            'operator' => 'EQ',
                            'search_value' => 2,
                        ],
                    ],
                ],
            ],
        ], $variables);
    }

    /** @test */
    public function it_supports_operator_argument_when_calling_orWhere()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->where('id', 1)
            ->orWhere('name', '!=', 'Joey');

        $queryString = (string)$queryBuilder->getQuery()->query();
        $variables = $queryBuilder->getQuery()->variables();

        $this->assertMatchesRegularExpression('/^query\(\$dummies_search: \[Search\]\) \{[\s\r\n]+dummies\(search: \$dummies_search\) {/i', $queryString);
        $this->assertEqualsCanonicalizing([
            'dummies_search' => [
                [
                    'integer_fields' => [
                        [
                            'attribute' => 'id',
                            'operator' => 'EQ',
                            'search_value' => 1,
                        ],
                    ],
                ],
                [
                    'string_fields' => [
                        [
                            'attribute' => 'name',
                            'match' => false,
                            'search_value' => 'Joey',
                            'partial_matching' => false,
                        ],
                    ],
                ],
            ],
        ], $variables);
    }

    /** @test */
    public function it_bubbles_graphql_variables_from_relations_to_root_query_element()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->with([
                'anotherDummyResource' => function($query) {
                    return $query
                        ->with(['andAnotherDummyResources' => fn($q) => $q->where('name', 'Sean')])
                        ->sortBy('id', 'ASC');
                }
            ])
            ->where('id', 1);

        $variables = $this->getGraphQlQueryVariableDeclarations($queryBuilder->getQuery()->query());
        $this->assertEqualsCanonicalizing([
            'dummies_search',
            'another_dummy_resource_sorter',
            'and_another_dummy_resources_search',
        ], \array_keys($variables));

        $variables = $queryBuilder->getQuery()->variables();
        $this->assertArrayHasKey('dummies_search', $variables);
        $this->assertArrayHasKey('another_dummy_resource_sorter', $variables);
        $this->assertArrayHasKey('and_another_dummy_resources_search', $variables);
    }

    /** @test */
    public function it_does_query_a_resources_fields()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'));

        $dummies = $queryBuilder->getQuery()->query()->getSelectionSet()[0];
        $entities = $dummies->getSelectionSet();

        $this->assertEqualsCanonicalizing([
            'id', 'name', 'some_date_time',
        ], $entities);
    }

    /** @test */
    public function it_does_work_with_resource_that_does_not_extend_base_resource()
    {
        $queryBuilder = (new QueryBuilder(BasicDummyResource::class, 'dummy'));

        $this->assertEquals([
            'entities' => [
                'var1'
            ],
        ], $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query()));
    }

    /** @test */
    public function it_does_query_fields_from_nested_relations()
    {
        $queryBuilder = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->with([
                'anotherDummyResource' => function($query) {
                    return $query->with('andAnotherDummyResources');
                }
            ]);

        $selections = $this->getGraphQlQuerySelectionsAsArray($queryBuilder->getQuery()->query());

        $this->assertEqualsCanonicalizing([
            'entities' => [
                'id',
                'name',
                'some_date_time',
                'another_dummy_resource' => [
                    'name',
                    'and_another_dummy_resources' => [
                        'entities' => [
                            'name'
                        ]
                    ]
                ]
            ]
        ], $selections);
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_whereHas()
    {
        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies');
        $queryBuilder2 = $queryBuilder1->whereHas('anotherDummyResource');

        $this->assertNotSame($queryBuilder1, $queryBuilder2);
    }

    /** @test */
    public function it_applies_a_reverse_relation_filter_to_query_when_calling_whereHas()
    {
        $query = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->whereHas('anotherDummyResource')
            ->getQuery();

        $this->assertEquals([
            'dummies_rrf' => '[ReverseRelationFilter]',
        ], $this->getGraphQlQueryVariableDeclarations($query->query()));

        $this->assertMatchesRegularExpression('/query\(.+?\) {[\r\n\s]+dummies\(reverse_relation_filters: \$dummies_rrf\) {/s', (string)$query->query());

        $this->assertEquals([
            'dummies_rrf' => [
                [
                    'relation' => 'another_dummy_resource',
                    'is_empty' => false,
                    'group' => '1',
                ]
            ]
        ], $query->variables());
    }

    /** @test */
    public function it_omits_is_empty_on_rrf_if_search_callable_given_when_calling_whereHas()
    {
        $query = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->whereHas('anotherDummyResource', fn($search) => $search->where('name', 'test'))
            ->getQuery();

        $this->assertEquals([
            'dummies_rrf' => [
                [
                    'relation' => 'another_dummy_resource',
                    'search' => [
                        [
                            'string_fields' => [
                                [
                                    'attribute' => 'name',
                                    'search_value' => 'test',
                                    'match' => true,
                                    'partial_matching' => false,
                                ]
                            ]
                        ]
                    ],
                    'group' => '1',
                ]
            ]
        ], $query->variables());
    }

    /** @test */
    public function it_does_return_new_query_builder_when_calling_orWhereHas()
    {
        $queryBuilder1 = new QueryBuilder(DummyResource::class, 'dummies');
        $queryBuilder2 = $queryBuilder1->whereHas('anotherDummyResource');
        $queryBuilder3 = $queryBuilder2->orWhereHas('foo');

        $this->assertNotSame($queryBuilder2, $queryBuilder3);
    }

    /** @test */
    public function it_throws_exception_when_calling_orWhereHas_before_whereHas()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Cannot call orWhereHas() before a whereHas()!");

        (new QueryBuilder(DummyResource::class, 'dummies'))
            ->orWhereHas('foo');
    }

    /** @test */
    public function it_creates_new_rrf_and_increments_group_on_rrf_when_calling_orWhereHas()
    {
        $query = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->whereHas('anotherDummyResource', fn($search) => $search->where('name', 'test'))
            ->orWhereHas('foo')
            ->getQuery();

        $this->assertEquals([
            'dummies_rrf' => [
                [
                    'relation' => 'another_dummy_resource',
                    'search' => [
                        [
                            'string_fields' => [
                                [
                                    'attribute' => 'name',
                                    'search_value' => 'test',
                                    'match' => true,
                                    'partial_matching' => false,
                                ]
                            ]
                        ]
                    ],
                    'group' => '1',
                ],
                [
                    'relation' => 'foo',
                    'is_empty' => false,
                    'group' => '2',
                ]
            ]
        ], $query->variables());
    }

    /** @test */
    public function it_creates_new_rrf_when_calling_second_whereHas()
    {
        $query = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->whereHas('anotherDummyResource', fn($search) => $search->where('name', 'test'))
            ->whereHas('foo')
            ->getQuery();

        $this->assertEquals([
            'dummies_rrf' => [
                [
                    'relation' => 'another_dummy_resource',
                    'search' => [
                        [
                            'string_fields' => [
                                [
                                    'attribute' => 'name',
                                    'search_value' => 'test',
                                    'match' => true,
                                    'partial_matching' => false,
                                ]
                            ]
                        ]
                    ],
                    'group' => '1',
                ],
                [
                    'relation' => 'foo',
                    'is_empty' => false,
                    'group' => '1',
                ]
            ]
        ], $query->variables());
    }

    /** @test */
    public function it_creates_reverse_relation_filter_with_is_empty_true_when_calling_whereNotHas()
    {
        $query = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->whereNotHas('foo')
            ->getQuery();

        $this->assertEquals([
            'dummies_rrf' => [
                [
                    'relation' => 'foo',
                    'is_empty' => true,
                    'group' => '1',
                ]
            ]
        ], $query->variables());
    }

    /** @test */
    public function it_creates_new_rrf_in_new_group_with_is_empty_true_when_calling_orWhereNotHas()
    {
        $query = (new QueryBuilder(DummyResource::class, 'dummies'))
            ->whereHas('anotherDummyResource', fn($search) => $search->where('name', 'test'))
            ->orWhereNotHas('foo')
            ->getQuery();

        $this->assertEquals([
            'dummies_rrf' => [
                [
                    'relation' => 'another_dummy_resource',
                    'search' => [
                        [
                            'string_fields' => [
                                [
                                    'attribute' => 'name',
                                    'search_value' => 'test',
                                    'match' => true,
                                    'partial_matching' => false,
                                ]
                            ]
                        ]
                    ],
                    'group' => '1',
                ],
                [
                    'relation' => 'foo',
                    'is_empty' => true,
                    'group' => '2',
                ]
            ]
        ], $query->variables());
    }

    /** @test */
    public function it_throws_exception_when_calling_orWhereNotHas_before_whereHas()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Cannot call orWhereNotHas() before a whereHas()!");

        (new QueryBuilder(DummyResource::class, 'dummies'))
            ->orWhereNotHas('foo');
    }
}

class DummyResourceThatHasADefaultWith extends BaseResource
{
    public DummyResource $dummyResource;

    public static function with(): array
    {
        return ['dummyResource'];
    }
}

class DummyResourceThatHasADefaultWithThatHasNestedWith extends BaseResource
{
    public DummyResource $dummyResource;

    public static function with(): array
    {
        return ['dummyResource' => fn($query) => $query->with('anotherDummyResource')];
    }
}

class BasicDummyResource implements ResourceInterface
{
    public int $var1;

    public function __construct(int $var1)
    {
        $this->var1 = $var1;
    }

    public static function fromJsonObject(object $jsonObject): self
    {
        return new self($jsonObject->var1);
    }
}