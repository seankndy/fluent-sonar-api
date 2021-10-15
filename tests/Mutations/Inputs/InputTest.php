<?php

namespace SeanKndy\SonarApi\Tests\Mutations\Inputs;

use SeanKndy\SonarApi\Mutations\Inputs\Input;
use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Int64Bit;

class InputTest extends TestCase
{
    /** @test */
    public function it_resolves_data_properly()
    {
        $input = new Input('TestType', [
            'dataTypeField' => new Int64Bit(12345),
            'inputTypeField' => new Input('InnerTestType', ['fooField' => 'bar']),
            'arrayOfDataTypeFields' => [
                new Int64Bit(1234),
                new Int64Bit(5678),
            ],
            'arrayOfInputTypeFields' => [
                new Input('InnerTestType1', ['fooField1' => 'bar']),
                new Input('InnerTestType2', ['fooField2' => 'baz']),
            ],
            'nestedInputTypeField' => new Input('InnerTestType', ['fooField' => new Input('InnerInnerTestType', ['innerFooField' => 'bar'])]),
            'simpleField' => "foobar",
        ]);

        $this->assertEquals([
            'data_type_field' => 12345,
            'input_type_field' => [
                'foo_field' => 'bar',
            ],
            'array_of_data_type_fields' => [
                1234,
                5678,
            ],
            'array_of_input_type_fields' => [
                ['foo_field1' => 'bar'],
                ['foo_field2' => 'baz'],
            ],
            'nested_input_type_field' => [
                'foo_field' => [
                    'inner_foo_field' => 'bar',
                ],
            ],
            'simple_field' => 'foobar',
        ], $input->toArray());
    }
}