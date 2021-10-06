<?php

namespace SeanKndy\SonarApi\Tests\Resources;

use SeanKndy\SonarApi\Resources\BaseResource;
use SeanKndy\SonarApi\Tests\TestCase;

class ConcreteResource extends BaseResource
{
    public int $id;

    public string $name;
}

class BaseResourceTest extends TestCase
{
    /** @test */
    public function it_throws_exception_if_instantiated_with_nonexistent_property_in_array()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Property 'foo' does not exist on Resource class SeanKndy\SonarApi\Tests\Resources\ConcreteResource");

        new ConcreteResource([
            'foo' => 'bar',
        ]);
    }

    /** @test */
    public function it_sets_properties_when_instantiated_with_array()
    {
        $resource = new ConcreteResource([
            'id' => 1234,
            'name' => 'John Doe',
        ]);

        $this->assertEquals(1234, $resource->id);
        $this->assertEquals('John Doe', $resource->name);
    }


}