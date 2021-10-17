<?php

namespace SeanKndy\SonarApi\Tests\Reflection;

use SeanKndy\SonarApi\Reflection\PropertyType;
use SeanKndy\SonarApi\Reflection\Reflection;
use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Int64Bit;

class ReflectionTest extends TestCase
{
    /** @test */
    public function it_allows_docblocks_to_be_on_typed_properties_that_have_no_var_definition()
    {
        $properties = Reflection::getPropertiesAndTypes(new ClassThatHasPropertyWithTypeAndADocblock(), \ReflectionProperty::IS_PUBLIC);

        $this->assertEquals('int', $properties['foo']->type());
    }

    /** @test */
    public function it_prefers_docblock_type_over_php_type_on_properties()
    {
        $properties = Reflection::getPropertiesAndTypes(new ClassThatHasPropertiesWithTypesAndADocblockTypes(), \ReflectionProperty::IS_PUBLIC);

        $this->assertEquals('string', $properties['foo']->type());
        $this->assertTrue($properties['foo']->arrayOf());
    }

    /** @test */
    public function it_sets_arrayOf_if_php_type_is_array_but_still_uses_docblock_type_for_type()
    {
        $properties = Reflection::getPropertiesAndTypes(new ClassThatHasPropertiesWithTypesAndADocblockTypes(), \ReflectionProperty::IS_PUBLIC);

        $this->assertEquals('\\SeanKndy\\SonarApi\\Tests\\Dummy\\DummyResource', $properties['bar']->type());
        $this->assertTrue($properties['bar']->arrayOf());
    }

    /** @test */
    public function it_does_get_properties_and_types()
    {
        $public = Reflection::getPropertiesAndTypes(new DummyClass(), \ReflectionProperty::IS_PUBLIC);
        $protected = Reflection::getPropertiesAndTypes(new DummyClass(), \ReflectionProperty::IS_PROTECTED);
        $private = Reflection::getPropertiesAndTypes(new DummyClass(), \ReflectionProperty::IS_PRIVATE);

        $this->assertEquals([
            'publicTypeInterface',
            'publicTypeInterfaces'
        ], \array_keys($public));
        $this->assertEquals(new PropertyType(Int64Bit::class, false), $public['publicTypeInterface']);
        $this->assertEquals(new PropertyType('\\'.Int64Bit::class, true), $public['publicTypeInterfaces']);

        $this->assertEquals([
            'protectedString',
        ], \array_keys($protected));
        $this->assertEquals(new PropertyType('string', false), $protected['protectedString']);

        $this->assertEquals([
            'privateInt',
        ], \array_keys($private));
        $this->assertEquals(new PropertyType('int', false), $private['privateInt']);
    }

    /** @test */
    public function it_throws_exception_if_property_not_typed()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Property '".\SeanKndy\SonarApi\Tests\Reflection\ClassThatHasPropertyWithNoType::class.":foo' has no type!");

        $public = Reflection::getPropertiesAndTypes(new ClassThatHasPropertyWithNoType(), \ReflectionProperty::IS_PUBLIC);
    }
}

class DummyClass
{
    private int $privateInt;

    protected string $protectedString;

    public Int64Bit $publicTypeInterface;

    /**
     * @var \SeanKndy\SonarApi\Types\Int64Bit[]
     */
    public array $publicTypeInterfaces;
}

class ClassThatHasPropertyWithNoType
{
    public $foo;
}


class ClassThatHasPropertyWithTypeAndADocblock
{
    /**
     * An integer.
     */
    public int $foo;
}


class ClassThatHasPropertiesWithTypesAndADocblockTypes
{
    /**
     * @var string[]
     */
    public array $foo;

    /**
     * @var \SeanKndy\SonarApi\Tests\Dummy\DummyResource
     */
    public array $bar;
}
