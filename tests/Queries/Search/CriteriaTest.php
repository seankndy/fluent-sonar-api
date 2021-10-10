<?php

namespace SeanKndy\SonarApi\Tests\Queries\Search;

use SeanKndy\SonarApi\Queries\Search\BooleanCriteria;
use SeanKndy\SonarApi\Queries\Search\Criteria;
use SeanKndy\SonarApi\Queries\Search\IntegerCriteria;
use SeanKndy\SonarApi\Queries\Search\NullCriteria;
use SeanKndy\SonarApi\Queries\Search\StringCriteria;
use SeanKndy\SonarApi\Tests\TestCase;

class CriteriaTest extends TestCase
{
    /**
     * @test
     * @dataProvider invalidOperatorDataProvider
     */
    public function it_throws_exception_when_initialized_with_invalid_operator($operator)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Operator '$operator' not a valid operator.");

        new TestCriteria('field', $operator, 'blah');
    }

    /**
     * @test
     * @dataProvider validOperatorDataProvider
     */
    public function it_accepts_valid_operators($operator)
    {
        $this->assertInstanceOf(TestCriteria::class, new TestCriteria('field', $operator, 'blah'));
    }

    /**
     * @test
     * @dataProvider criteriaTypesDataProvider
     */
    public function it_creates_appropriate_criteria_class($value, $expectedClass)
    {
        $this->assertInstanceOf($expectedClass, Criteria::create('field', '=', $value));
    }

    public function validOperatorDataProvider()
    {
        return [['!='], ['=']];
    }

    public function invalidOperatorDataProvider()
    {
        return [['!~'], ['=~'], ['>'], ['<'], ['>='], ['<=']];
    }

    public function criteriaTypesDataProvider()
    {
        return [
            [1234, IntegerCriteria::class],
            [true, BooleanCriteria::class],
            [NULL, NullCriteria::class],
            ['test', StringCriteria::class],
            [12.23, StringCriteria::class],
        ];
    }
}

class TestCriteria extends Criteria
{
    protected function validOperators(): array
    {
        return ['=', '!='];
    }

    public function fieldName(): string
    {
        return 'test_fields';
    }

    public function toSonarObject()
    {
        return [
            'attribute' => $this->field,
            'operator' => $this->operator,
            'search_value' => $this->value,
        ];
    }
}
