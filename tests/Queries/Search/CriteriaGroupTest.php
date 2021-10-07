<?php

namespace SeanKndy\SonarApi\Tests\Queries\Search;

use SeanKndy\SonarApi\Queries\Search\BooleanCriteria;
use SeanKndy\SonarApi\Queries\Search\CriteriaGroup;
use SeanKndy\SonarApi\Queries\Search\IntegerCriteria;
use SeanKndy\SonarApi\Queries\Search\StringCriteria;
use SeanKndy\SonarApi\Tests\TestCase;

class CriteriaGroupTest extends TestCase
{
    /** @test */
    public function it_merges_two_groups_properly()
    {
        $criteriaGroup1 = new CriteriaGroup([
            new IntegerCriteria('id', '=', 1234),
            new StringCriteria('name', '=', 'Jane'),
        ]);

        $criteriaGroup2 = new CriteriaGroup([
            new IntegerCriteria('id', '!=', 4567),
            new StringCriteria('name', '=', 'John'),
            new BooleanCriteria('active', '=', true),
        ]);

        $criteriaGroup3 = $criteriaGroup1->merge($criteriaGroup2);

        // make sure returned a new instance
        $this->assertNotSame($criteriaGroup1, $criteriaGroup3);
        $this->assertNotSame($criteriaGroup2, $criteriaGroup3);

        $this->assertEqualsCanonicalizing([
            'integer_fields' => [
                [
                    'attribute' => 'id',
                    'search_value' => 1234,
                    'operator' => 'EQ',
                ],
                [
                    'attribute' => 'id',
                    'search_value' => 4567,
                    'operator' => 'NEQ',
                ],
            ],
            'string_fields' => [
                [
                    'attribute' => 'name',
                    'search_value' => 'Jane',
                    'match' => true,
                    'partial_matching' => false,
                ],
                [
                    'attribute' => 'name',
                    'search_value' => 'John',
                    'match' => true,
                    'partial_matching' => false,
                ],
            ],
            'boolean_fields' => [
                [
                    'attribute' => 'active',
                    'search_value' => true,
                ],
            ],
        ], $criteriaGroup3->toArray());

    }

    /** @test */
    public function it_merges_empty_criteria_group_properly()
    {
        $criteriaGroup1 = new CriteriaGroup([
            new IntegerCriteria('id', '=', 1234),
            new StringCriteria('name', '=', 'Jane'),
        ]);
        $criteriaGroup2 = new CriteriaGroup();

        $criteriaGroup3 = $criteriaGroup1->merge($criteriaGroup2);

        $this->assertEqualsCanonicalizing([
            'integer_fields' => [
                [
                    'attribute' => 'id',
                    'search_value' => 1234,
                    'operator' => 'EQ',
                ],
            ],
            'string_fields' => [
                [
                    'attribute' => 'name',
                    'search_value' => 'Jane',
                    'match' => true,
                    'partial_matching' => false,
                ],
            ],
        ], $criteriaGroup3->toArray());
    }

    /** @test */
    public function it_merges_two_empty_criteria_group_properly()
    {
        $criteriaGroup1 = new CriteriaGroup();
        $criteriaGroup2 = new CriteriaGroup();

        $criteriaGroup3 = $criteriaGroup1->merge($criteriaGroup2);

        $this->assertEqualsCanonicalizing([], $criteriaGroup3->toArray());
    }
}
