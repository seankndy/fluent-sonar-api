<?php

namespace SeanKndy\SonarApi\Tests\Mutations;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Mutations\BaseMutation;
use SeanKndy\SonarApi\Mutations\ClientMutator;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;
use SeanKndy\SonarApi\Tests\TestCase;

class ClientMutatorTest extends TestCase
{
    /** @test */
    public function it_does_run_mutation_and_return_resource()
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(201, [], \json_encode([
                    'data' => [
                        'dummy' => [
                            'id' => 1234,
                            'name' => 'Testing',
                            'some_date_time' => '2018-09-26T21:40:29+02:00',
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $resource = (new ClientMutator($client))->run(
            new class() extends BaseMutation {
                public string $fieldDontMatter;

                public function __construct() {
                    $this->fieldDontMatter = 'testing';
                }

                public function returnResource(): ?string {
                    return DummyResource::class;
                }

                public function name(): string {
                    return 'dummy';
                }
            }
        );

        $this->assertInstanceOf(DummyResource::class, $resource);
        $this->assertEquals(1234, $resource->id);
    }

    /** @test */
    public function it_does_run_mutation_and_return_json_object_if_no_return_resouce_specified()
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(201, [], \json_encode([
                    'data' => [
                        'dummy' => [
                            'id' => 1234,
                            'name' => 'Testing',
                            'some_date_time' => '2018-09-26T21:40:29+02:00',
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $json = (new ClientMutator($client))->run(
            new class() extends BaseMutation {
                public string $fieldDontMatter;

                public function __construct()
                {
                    $this->fieldDontMatter = 'testing';
                }

                public function returnResource(): ?string
                {
                    return null;
                }

                public function name(): string
                {
                    return 'dummy';
                }
            }
        );

        $this->assertEquals(\json_decode(\json_encode([
            'dummy' => [
                'id' => 1234,
                'name' => 'Testing',
                'some_date_time' => '2018-09-26T21:40:29+02:00',
            ],
        ]), false), $json);
    }
}