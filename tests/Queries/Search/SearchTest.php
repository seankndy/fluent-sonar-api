<?php

namespace SeanKndy\SonarApi\Tests\Queries\Search;

use SeanKndy\SonarApi\Queries\Search\Search;
use SeanKndy\SonarApi\Tests\TestCase;

class SearchTest extends TestCase
{
    /** @test */
    public function it_throws_exception_if_where_has_one_argument()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Minimum of 2 arguments, maximum of 3.');

        (new Search())->where('field');
    }

    /** @test */
    public function it_throws_exception_if_orWhere_has_one_argument()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Minimum of 2 arguments, maximum of 3.');

        (new Search())->where('field', 'value')->orWhere('field');
    }

    /** @test */
    public function it_throws_exception_if_where_has_four_arguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Minimum of 2 arguments, maximum of 3.');

        (new Search())->where('field', '=', 'something', 'something else');
    }

    /** @test */
    public function it_throws_exception_if_orWhere_has_four_arguments()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Minimum of 2 arguments, maximum of 3.');

        (new Search())->where('field', '=', 'something')->orWhere('field', '=', 'something', 'something else');
    }

    /** @test */
    public function it_throws_exception_if_orWhere_called_before_where()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('You cannot call orWhere() before where()!');

        (new Search())->orWhere('field', '=', 'something');
    }

    /** @test */
    public function it_returns_new_search_when_calling_where()
    {
        $search1 = new Search();
        $search2 = $search1->where('field', '=', 'something');

        $this->assertNotSame($search1, $search2);
    }

    /** @test */
    public function it_returns_new_search_when_calling_orWhere()
    {
        $search1 = new Search();
        $search2 = $search1->where('field', '=', 'something')->orWhere('field2', 'something else');

        $this->assertNotSame($search1, $search2);
    }

    /** @test */
    public function it_handles_multiple_wheres()
    {
        $search = (new Search())
            ->where('id', 1234)
            ->where('name', 'John')
            ->where('active', true)
            ->where('posts', null)
            ->where('company', '!=', null);

        $this->assertEqualsCanonicalizing([
            [
                'integer_fields' => [
                    [
                        'attribute' => 'id',
                        'search_value' => 1234,
                        'operator' => 'EQ',
                    ]
                ],
                'string_fields' => [
                    [
                        'attribute' => 'name',
                        'search_value' => 'John',
                        'match' => true,
                        'partial_matching' => false,
                    ]
                ],
                'boolean_fields' => [
                    [
                        'attribute' => 'active',
                        'search_value' => true,
                    ]
                ],
                'unset_fields' => ['posts'],
                'exists' => ['company'],
            ]
        ], $search->toArray());
    }

    /** @test */
    public function it_merges_wheres_with_same_field_types()
    {
        $search = (new Search())
            ->where('id', 1234)
            ->where('name', 'John')
            ->where('location', '!=', 'USA')
            ->where('active', true)
            ->where('has_friends', false)
            ->where('posts', null)
            ->where('likes', null)
            ->where('company', '!=', null)
            ->where('alerts', '!=', null);

        $this->assertEqualsCanonicalizing([
            [
                'integer_fields' => [
                    [
                        'attribute' => 'id',
                        'search_value' => 1234,
                        'operator' => 'EQ',
                    ]
                ],
                'string_fields' => [
                    [
                        'attribute' => 'name',
                        'search_value' => 'John',
                        'match' => true,
                        'partial_matching' => false,
                    ],
                    [
                        'attribute' => 'location',
                        'search_value' => 'USA',
                        'match' => false,
                        'partial_matching' => false,
                    ]
                ],
                'boolean_fields' => [
                    [
                        'attribute' => 'active',
                        'search_value' => true,
                    ],
                    [
                        'attribute' => 'has_friends',
                        'search_value' => false,
                    ]
                ],
                'unset_fields' => ['posts', 'likes'],
                'exists' => ['company', 'alerts'],
            ]
        ], $search->toArray());
    }

    /** @test */
    public function it_expands_array_of_where_values_into_existing_where_values()
    {
        $search = (new Search())
            ->where('id', 1234)
            ->where('name', 'John');

        $this->assertEqualsCanonicalizing([
            [
                'integer_fields' => [
                    [
                        'attribute' => 'id',
                        'search_value' => 1234,
                        'operator' => 'EQ',
                    ]
                ],
                'string_fields' => [
                    [
                        'attribute' => 'name',
                        'search_value' => 'John',
                        'match' => true,
                        'partial_matching' => false,
                    ]
                ],
            ]
        ], $search->toArray());

        $search = $search->where('status', ['active','inactive']);

        $this->assertEqualsCanonicalizing([
            [
                'integer_fields' => [
                    [
                        'attribute' => 'id',
                        'search_value' => 1234,
                        'operator' => 'EQ',
                    ]
                ],
                'string_fields' => [
                    [
                        'attribute' => 'name',
                        'search_value' => 'John',
                        'match' => true,
                        'partial_matching' => false,
                    ],
                    [
                        'attribute' => 'status',
                        'search_value' => 'active',
                        'match' => true,
                        'partial_matching' => false,
                    ],
                ],
            ],
            [
                'integer_fields' => [
                    [
                        'attribute' => 'id',
                        'search_value' => 1234,
                        'operator' => 'EQ',
                    ]
                ],
                'string_fields' => [
                    [
                        'attribute' => 'name',
                        'search_value' => 'John',
                        'match' => true,
                        'partial_matching' => false,
                    ],
                    [
                        'attribute' => 'status',
                        'search_value' => 'inactive',
                        'match' => true,
                        'partial_matching' => false,
                    ],
                ],
            ]
        ], $search->toArray());
    }

    /** @test */
    public function it_throws_exception_when_where_called_with_array_of_values_after_an_orWhere_was_called()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('You cannot call where() with array of values after an orWhere() due to limitations with Sonar searching.');

        (new Search())
            ->where('field', '=', 'something')
            ->orWhere('field', 'something else')
            ->where('uh_oh', ['cant', 'do', 'this']);
    }

    /** @test */
    public function it_appends_sonar_search_object_when_calling_orWhere()
    {
        $search = (new Search())
            ->where('id', 1234)
            ->where('name', 'John')
            ->orWhere('active', true)
            ->orWhere('posts', null);

        $this->assertEqualsCanonicalizing([
            [
                'integer_fields' => [
                    [
                        'attribute' => 'id',
                        'search_value' => 1234,
                        'operator' => 'EQ',
                    ]
                ],
                'string_fields' => [
                    [
                        'attribute' => 'name',
                        'search_value' => 'John',
                        'match' => true,
                        'partial_matching' => false,
                    ]
                ],
            ],
            [
                'boolean_fields' => [
                    [
                        'attribute' => 'active',
                        'search_value' => true,
                    ]
                ],
            ],
            [
                'unset_fields' => ['posts'],
            ],
        ], $search->toArray());
    }

    /** @test */
    public function it_appends_where_value_to_last_orWhere()
    {
        $search = (new Search())
            ->where('id', 1234)
            ->where('name', 'John')
            ->orWhere('active', true)
            ->orWhere('posts', null)
            ->where('location', 'USA'); // this should become ANDed with the 'posts' orWhere

        $this->assertEqualsCanonicalizing([
            [
                'integer_fields' => [
                    [
                        'attribute' => 'id',
                        'search_value' => 1234,
                        'operator' => 'EQ',
                    ]
                ],
                'string_fields' => [
                    [
                        'attribute' => 'name',
                        'search_value' => 'John',
                        'match' => true,
                        'partial_matching' => false,
                    ],
                ],
            ],
            [
                'boolean_fields' => [
                    [
                        'attribute' => 'active',
                        'search_value' => true,
                    ]
                ],
            ],
            [
                'unset_fields' => ['posts'],
                'string_fields' => [
                    [
                        'attribute' => 'location',
                        'search_value' => 'USA',
                        'match' => true,
                        'partial_matching' => false,
                    ],
                ],
            ],
        ], $search->toArray());
    }
}