<?php

namespace SeanKndy\SonarApi\Tests\Queries\Search;

use SeanKndy\SonarApi\Queries\Search\BooleanCriteria;
use SeanKndy\SonarApi\Tests\TestCase;

class BooleanCriteriaTest extends TestCase
{
    /**
     * @test
     * @dataProvider invalidOperatorDataProvider
     */
    public function it_throws_exception_when_initialized_with_operator_that_isnt_eq($operator)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Operator '$operator' not a valid operator.");

        new BooleanCriteria('field', $operator, 'blah');
    }

    public function invalidOperatorDataProvider()
    {
        return [['!='], ['>'], ['<'], ['>='], ['<='], ['=~'], ['!~']];
    }
}

