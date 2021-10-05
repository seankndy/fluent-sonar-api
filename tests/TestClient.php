<?php

namespace SeanKndy\SonarApi\Tests;

use GuzzleHttp\Client as GuzzleClient;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;

class TestClient extends TestCase
{
    /** @test */
    public function it_can_be_instantiated_with_root_query_builders()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'testtoken',
            'https://dummy.com',
            ['dummies' => DummyResource::class]
        );

        // verify accounts is still callable
        $this->assertInstanceOf(QueryBuilder::class, $client->accounts());
        // verify extended method is callable
        $this->assertInstanceOf(QueryBuilder::class, $client->dummies());
    }

    /** @test */
    public function it_can_be_instantiated_with_overriding_root_query_builder()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'testtoken',
            'https://dummy.com',
            ['accounts' => DummyResource::class]
        );

        $this->assertInstanceOf(QueryBuilder::class, $client->accounts());
        $this->assertSame(DummyResource::class, $client->accounts()->getResource());
    }

    /** @test */
    public function it_does_convert_query_builder_object_names_to_snake_case()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'testtoken',
            'https://dummy.com',
            ['dummyResource' => DummyResource::class]
        );

        $this->assertSame('dummy_resource', $client->dummyResource()->getObjectName());
    }

    /** @test */
    public function it_will_throw_an_error_when_calling_unknown_method()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'testtoken',
            'https://dummy.com',
            ['dummyResource' => DummyResource::class]
        );

        $this->expectError();
        $client->unknownMethod();
    }
}