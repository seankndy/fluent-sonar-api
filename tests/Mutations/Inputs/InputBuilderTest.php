<?php

namespace SeanKndy\SonarApi\Tests\Mutations\Inputs;

use SeanKndy\SonarApi\Mutations\Inputs\Input;
use SeanKndy\SonarApi\Mutations\Inputs\InputBuilder;
use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Int64Bit;

class InputBuilderTest extends TestCase
{
    /** @test */
    public function it_returns_new_instance_when_calling_type()
    {
        $builder1 = new InputBuilder();
        $builder2 = $builder1->type('TestType');

        $this->assertNotSame($builder1, $builder2);
    }

    /** @test */
    public function it_returns_new_instance_when_calling_data()
    {
        $builder1 = new InputBuilder();
        $builder2 = $builder1->data(['foo' => 'bar']);

        $this->assertNotSame($builder1, $builder2);
    }

    /** @test */
    public function it_returns_input_interface_with_given_data_when_calling_build()
    {
        $input = (new InputBuilder())->type('OuterTestType')->data([
            'foo' => 'bar',
            'typeField' => fn(InputBuilder $input): InputBuilder => $input->type('InnerTestType')->data([
                'name' => 'testing',
            ])
        ])->build();

        $this->assertEquals('OuterTestType', $input->typeName());
        $this->assertEquals([
            'foo' => 'bar',
            'typeField' => new Input('InnerTestType', ['name' => 'testing']),
        ], $input->getData());
    }
}