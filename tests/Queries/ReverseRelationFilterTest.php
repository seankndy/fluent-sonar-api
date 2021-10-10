<?php

namespace SeanKndy\SonarApi\Tests\Queries;

use SeanKndy\SonarApi\Queries\ReverseRelationFilter;
use SeanKndy\SonarApi\Queries\Search\Search;
use SeanKndy\SonarApi\Tests\TestCase;

class ReverseRelationFilterTest extends TestCase
{
    /** @test */
    public function it_converts_relations_to_snake_case()
    {
        $rrf = new ReverseRelationFilter('oneRelation.twoRelation.threeRelation');

        $this->assertEquals([
            'relation' => 'one_relation.two_relation.three_relation',
        ], $rrf->toArray());
    }

    /** @test */
    public function it_includes_search_if_search_not_empty()
    {
        $rrf = new ReverseRelationFilter(
            'oneRelation.twoRelation.threeRelation',
            (new Search())->where('field', 'test'),
        );

        $this->assertEquals([
            'relation' => 'one_relation.two_relation.three_relation',
            'search' => [
                [
                    'string_fields' => [
                        [
                            'attribute' => 'field',
                            'search_value' => 'test',
                            'match' => true,
                            'partial_matching' => false,
                        ]
                    ]
                ]
            ]
        ], $rrf->toArray());
    }

    /** @test */
    public function it_omits_search_if_search_empty()
    {
        $rrf = new ReverseRelationFilter(
            'oneRelation.twoRelation.threeRelation',
            (new Search()),
        );

        $this->assertArrayNotHasKey('search', $rrf->toArray());
    }

    /** @test */
    public function it_includes_is_empty_if_is_empty_not_null()
    {
        $rrf = new ReverseRelationFilter(
            'oneRelation.twoRelation.threeRelation',
            (new Search()),
            '1',
            false
        );

        $this->assertFalse($rrf->toArray()['is_empty']);
    }

    /** @test */
    public function it_omits_is_empty_if_is_empty_null()
    {
        $rrf = new ReverseRelationFilter(
            'oneRelation.twoRelation.threeRelation',
            (new Search()),
            '1',
            null
        );

        $this->assertArrayNotHasKey('is_empty', $rrf->toArray());
    }

    /** @test */
    public function it_includes_group_if_group_not_null()
    {
        $rrf = new ReverseRelationFilter(
            'oneRelation.twoRelation.threeRelation',
            (new Search()),
            '1',
        );

        $this->assertEquals('1', $rrf->toArray()['group']);
    }

    /** @test */
    public function it_omits_group_if_group_null()
    {
        $rrf = new ReverseRelationFilter(
            'oneRelation.twoRelation.threeRelation',
            (new Search()),
            null
        );

        $this->assertArrayNotHasKey('group', $rrf->toArray());
    }
}