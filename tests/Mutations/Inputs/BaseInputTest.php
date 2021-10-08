<?php

namespace SeanKndy\SonarApi\Tests\Mutations\Inputs;

use PHPUnit\Util\Test;
use SeanKndy\SonarApi\Mutations\Inputs\BaseInput;
use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Int64Bit;

class BaseInputTest extends TestCase
{
    /** @test */
    public function it_throws_exception_when_instantiating_input_with_public_property()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage(TestInputWithPublicProperty::class . " has public properties defined and this is not allowed.");

        new TestInputWithPublicProperty([
            'noGood' => 1234,
        ]);
    }

    /** @test */
    public function it_throws_exception_when_instantiating_input_with_unknown_property()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Property 'unknownField' does not exist on mutation input class " . TestInput::class);

        new TestInput([
            'unknownField' => 'asdfasdf',
        ]);
    }

    /** @test */
    public function it_allows_properties_to_be_set_after_instantiation()
    {
        $input = new TestInput();

        $input->intField = 12345;

        $this->assertEquals([
            'int_field' => 12345,
        ], $input->toArray());
    }

    /** @test */
    public function it_throws_exception_when_setting_property_with_unknown_property()
    {
        $input = new TestInput();

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Property 'unknownField' does not exist on mutation input class " . TestInput::class);

        $input->unknownField = 'asdfafd';
    }

    /** @test */
    public function it_includes_only_set_properties_when_converting_to_array()
    {
        $input = new TestInput();

        $input->stringField = 'testing';

        $this->assertEquals([
            'string_field' => 'testing',
        ], $input->toArray());
    }

    /** @test */
    public function it_handles_array_of_type_interfaces_when_converting_to_array()
    {
        $input = new TestInput([
            'int64BitFields'  => [
                new Int64Bit(12341),
                new Int64Bit(15323),
            ],
        ]);

        $this->assertEquals([
            'int64_bit_fields' => [
                12341,
                15323,
            ],
        ], $input->toArray());
    }

    /** @test */
    public function it_handles_nested_input_objects_when_converting_to_array()
    {
        $input = new NestingInput([
            'testInput' => new TestInput([
                'intField' => 1234,
                'int64BitField' => new Int64Bit(12341),
                'stringField' => 'testing',
            ]),
            'testInputs' => [
                new TestInput([
                    'intField' => 12345,
                    'stringField' => 'foo',
                ]),
                new TestInput([
                    'intField' => 2424,
                    'stringField' => 'bar',
                ])
            ]
        ]);

        $this->assertEquals([
            'test_input' => [
                'int_field' => 1234,
                'int64_bit_field' => 12341,
                'string_field' => 'testing',
            ],
            'test_inputs' => [
                [
                    'int_field' => 12345,
                    'string_field' => 'foo',
                ],
                [
                    'int_field' => 2424,
                    'string_field' => 'bar',
                ],
            ]
        ], $input->toArray());
    }

    /** @test */
    public function it_returns_base_class_name_when_calling_typeName()
    {
        $this->assertEquals('TestInput', TestInput::typeName());
    }
}

class TestInput extends BaseInput
{
    protected int $intField;

    protected string $stringField;

    protected Int64Bit $int64BitField;

    /**
     * @var \SeanKndy\SonarApi\Types\Int64Bit[]
     */
    protected array $int64BitFields;
}

class TestInputWithPublicProperty extends BaseInput
{
    public int $noGood;
}

class NestingInput extends BaseInput
{
    protected int $intField;

    protected string $stringField;

    protected TestInput $testInput;

    /**
     * @var \SeanKndy\SonarApi\Tests\Mutations\Inputs\TestInput[]
     */
    protected array $testInputs;
}