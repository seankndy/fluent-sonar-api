<?php

namespace SeanKndy\SonarApi\Tests\Queries;

use Illuminate\Support\Collection;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Queries\QueryInterface;
use SeanKndy\SonarApi\Resources\ResourceInterface;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;
use SeanKndy\SonarApi\Tests\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use SeanKndy\SonarApi\Client;

class QueryBuilderTest extends TestCase
{
    /** @test */
    public function it_throws_exception_if_instantiated_without_resource_class(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('foo must implement '.ResourceInterface::class);

        new QueryBuilder('foo', 'foos');
    }

    /** @test */
    public function it_throws_exception_if_called_without_client_set_on_query_builder(): void
    {
        $this->expectException(\Exception::class);
        $this->expectDeprecationMessage('Cannot call get() without a client!');

        (new QueryBuilder(DummyResource::class, 'dummies', null))
            ->get();
    }

    /** @test */
    public function it_returns_singular_response_object_when_many_not_true(): void
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'dummy' => [
                            'name' => 'Testing',
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $data = (new QueryBuilder(DummyResource::class, 'dummy', $client))
            ->withMany(false)
            ->get();

        $this->assertInstanceOf(DummyResource::class, $data);
    }

    /** @test */
    public function it_returns_collection_when_many_is_true(): void
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'dummies' => [
                            'entities' => [
                                ['name' => 'Testing'],
                            ],
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $data = (new QueryBuilder(DummyResource::class, 'dummies', $client))
            ->withMany(true)
            ->get();

        $this->assertInstanceOf(Collection::class, $data);
        $this->assertInstanceOf(DummyResource::class, $data->first());
    }

    /** @test */
    public function it_throws_exception_if_first_called_without_many_being_true(): void
    {
        $this->expectException(\Exception::class);
        $this->expectDeprecationMessage('first() cannot be called because of singular query.');

        (new QueryBuilder(DummyResource::class, 'dummies', null))
            ->withMany(false)
            ->first();
    }

    /** @test */
    public function it_calls_first_on_response_collection(): void
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'dummies' => [
                            'entities' => [
                                ['name' => 'Testing 1'],
                                ['name' => 'Testing 2'],
                            ],
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $resource = (new QueryBuilder(DummyResource::class, 'dummies', $client))
            ->withMany(true)
            ->first();

        $this->assertInstanceOf(DummyResource::class, $resource);
        $this->assertSame('Testing 1', $resource->name);
    }
}