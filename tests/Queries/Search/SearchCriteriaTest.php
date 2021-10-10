<?php

namespace SeanKndy\SonarApi\Tests\Queries\Search;

use SeanKndy\SonarApi\Queries\Search\NullCriteria;
use SeanKndy\SonarApi\Queries\Search\StringCriteria;
use SeanKndy\SonarApi\Tests\TestCase;

class SearchCriteriaTest extends TestCase
{
    /** @test */
    public function it_sets_match_to_true_if_using_equality_operators()
    {
        $this->assertTrue((new StringCriteria('field', '=', 'blah'))->toSonarObject()['match']);
        $this->assertTrue((new StringCriteria('field', '=~', 'blah'))->toSonarObject()['match']);
    }

    /** @test */
    public function it_sets_match_to_false_if_using_non_equality_operators()
    {
        $this->assertFalse((new StringCriteria('field', '!=', 'blah'))->toSonarObject()['match']);
        $this->assertFalse((new StringCriteria('field', '!~', 'blah'))->toSonarObject()['match']);
    }

    /** @test */
    public function it_sets_partial_matching_to_true_if_using_partial_operators()
    {
        $this->assertTrue((new StringCriteria('field', '=~', 'blah'))->toSonarObject()['partial_matching']);
        $this->assertTrue((new StringCriteria('field', '!~', 'blah'))->toSonarObject()['partial_matching']);
    }

    /** @test */
    public function it_sets_partial_matching_to_false_if_not_using_partial_operators()
    {
        $this->assertFalse((new StringCriteria('field', '=', 'blah'))->toSonarObject()['partial_matching']);
        $this->assertFalse((new StringCriteria('field', '!=', 'blah'))->toSonarObject()['partial_matching']);
    }
}

