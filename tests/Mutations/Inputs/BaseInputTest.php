<?php

namespace SeanKndy\SonarApi\Tests\Mutations\Inputs;

use PHPUnit\Util\Test;
use SeanKndy\SonarApi\Mutations\Inputs\BaseInput;
use SeanKndy\SonarApi\Tests\TestCase;

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
    public function it_returns_base_class_name_when_calling_typeName()
    {
        $this->assertEquals('TestInput', TestInput::typeName());
    }
}

class TestInput extends BaseInput
{
    protected int $intField;

    protected string $stringField;
}

class TestInputWithPublicProperty extends BaseInput
{
    public int $noGood;
}