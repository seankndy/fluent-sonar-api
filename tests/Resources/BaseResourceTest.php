<?php

namespace SeanKndy\SonarApi\Tests\Resources;

use SeanKndy\SonarApi\Resources\BaseResource;
use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\EmailAddress;

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

    /** @test */
    public function it_can_convert_sonar_json_object_to_resource()
    {
        $jsonObject = \json_decode(\json_encode([
            'id' => 1234,
            'name' => 'John Doe',
            'date_time' => '2021-10-06T21:10:24+00:00',
            'email_address' => 'john@test.com',
            'array_of_values' => ['one', 'two', 'three'],
            'another_concrete_resources' => [
                'entities' => [
                    [
                        'id' => 100,
                        'name' => 'Jane Doe',
                    ],
                    [
                        'id' => 101,
                        'name' => 'Mark Smith',
                    ],
                ],
            ],
            'another_concrete_resource' => [
                'id' => 500,
                'name' => 'Donald Trump',
            ],
        ]), false);

        $resource = ConcreteResource::fromJsonObject($jsonObject);

        $this->assertEquals(1234, $resource->id);
        $this->assertEquals('John Doe', $resource->name);
        $this->assertInstanceOf(\DateTime::class, $resource->dateTime);
        $this->assertEquals('2021-10-06T21:10:24+00:00', $resource->dateTime->format(\DateTime::ATOM));
        $this->assertInstanceOf(EmailAddress::class, $resource->emailAddress);
        $this->assertEquals('john@test.com', $resource->emailAddress->value());
        $this->assertEquals(['one', 'two', 'three'], $resource->arrayOfValues);
        $this->assertEquals(100, $resource->anotherConcreteResources[0]->id);
        $this->assertEquals('Jane Doe', $resource->anotherConcreteResources[0]->name);
        $this->assertEquals(101, $resource->anotherConcreteResources[1]->id);
        $this->assertEquals('Mark Smith', $resource->anotherConcreteResources[1]->name);
        $this->assertEquals(500, $resource->anotherConcreteResource->id);
        $this->assertEquals('Donald Trump', $resource->anotherConcreteResource->name);
    }

    /** @test */
    public function it_handles_partial_fields_when_converting_from_json_object()
    {
        $jsonObject = \json_decode(\json_encode([
            'id' => 1234,
            'email_address' => 'john@test.com',
            'another_concrete_resource' => null,
        ]), false);

        $resource = ConcreteResource::fromJsonObject($jsonObject);

        $this->assertEquals(1234, $resource->id);
        $this->assertInstanceOf(EmailAddress::class, $resource->emailAddress);
        $this->assertEquals('john@test.com', $resource->emailAddress->value());
        $this->assertNull($resource->anotherConcreteResource);
    }

    /** @test */
    public function it_handles_empty_resource_relations_when_converting_from_json_object()
    {
        $jsonObject = \json_decode(\json_encode([
            'array_of_values' => [],
            'another_concrete_resources' => [],
            'another_concrete_resource' => null,
        ]), false);

        $resource = ConcreteResource::fromJsonObject($jsonObject);

        $this->assertEquals([], $resource->arrayOfValues);
        $this->assertEquals([], $resource->anotherConcreteResources);
        $this->assertNull($resource->anotherConcreteResource);
    }
}

class ConcreteResource extends BaseResource
{
    public int $id;

    public string $name;

    public \Datetime $dateTime;

    public EmailAddress $emailAddress;

    public array $arrayOfValues;

    /**
     * @var \SeanKndy\SonarApi\Tests\Resources\AnotherConcreteResource[]
     */
    public array $anotherConcreteResources;

    public ?AnotherConcreteResource $anotherConcreteResource;
}

class AnotherConcreteResource extends BaseResource
{
    public int $id;

    public string $name;
}