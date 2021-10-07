<?php

namespace SeanKndy\SonarApi\Tests\Types;

use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\BaseType;

class BaseTypeTest extends TestCase
{
    /** @test */
    public function it_returns_base_class_name_when_calling_name()
    {
        $this->assertEquals('MyTestType', (new MyTestType())->name());
    }

    /** @test */
    public function it_returns_string()
    {
        $this->assertSame('12345', (new MyTestType())->__toString());
    }
}

class MyTestType extends BaseType
{
    public function value()
    {
        return 12345;
    }
}