<?php

namespace SeanKndy\SonarApi\Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
use SeanKndy\SonarApi\Exceptions\SonarHttpException;
use SeanKndy\SonarApi\Exceptions\SonarQueryException;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Queries\QueryInterface;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;

class ClientTest extends TestCase
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
    public function it_can_be_instantiated_with_an_overriding_root_query_builder()
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

    /** @test */
    public function it_will_send_required_headers_in_query()
    {
        $apiKey = 'test_api_token';

        $guzzleMock = $this->createMock(GuzzleClient::class);
        $guzzleMock
            ->expects($this->once())
            ->method('request')
            ->with($this->anything(), $this->anything(), $this->callback(function ($subject) use ($apiKey) {
                return isset($subject['headers']) && isset($subject['headers']['Authorization'])
                    && $subject['headers']['Authorization'] == 'Bearer ' . $apiKey &&
                    isset($subject['headers']['Accept']) && $subject['headers']['Accept'] == 'application/json';
            }))
            ->willReturn(new Response(200, [], \json_encode(['data' => []])));

        $client = new Client(
            $guzzleMock,
            $apiKey,
            'https://dummy.com'
        );

        $client->query($this->createMock(QueryInterface::class));
    }

    /** @test */
    public function it_will_throw_sonar_http_exception_on_request_transfer_or_connection_exceptions()
    {
        $mockHandler = new MockHandler([
            new RequestException('', new Request('POST', 'https://dummy.com')),
            new TransferException(''),
            new ConnectException('', new Request('POST', 'https://dummy.com')),
        ]);

        $client = new Client(
            new GuzzleClient(['handler' => $mockHandler]),
            'test_token',
            'https://dummy.com'
        );

        try {
            $client->query($this->createMock(QueryInterface::class));
            $this->fail('SonarHttpException not thrown.');
        } catch (\Exception $e) {
            $this->assertInstanceOf(SonarHttpException::class, $e);
        }

        try {
            $client->query($this->createMock(QueryInterface::class));
            $this->fail('SonarHttpException not thrown.');
        } catch (\Exception $e) {
            $this->assertInstanceOf(SonarHttpException::class, $e);
        }

        try {
            $client->query($this->createMock(QueryInterface::class));
            $this->fail('SonarHttpException not thrown.');
        } catch (\Exception $e) {
            $this->assertInstanceOf(SonarHttpException::class, $e);
        }
    }

    /** @test */
    public function it_will_throw_sonar_query_exception_on_api_error_response()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], \json_encode(['errors' => ['Some error.']]))
        ]);

        $client = new Client(
            new GuzzleClient(['handler' => $mockHandler]),
            'test_token',
            'https://dummy.com'
        );

        $this->expectException(SonarQueryException::class);
        $client->query($this->createMock(QueryInterface::class));
    }

    /** @test */
    public function it_will_throw_sonar_format_exception_on_no_data_attribute_response()
    {
        $mockHandler = new MockHandler([
            new Response(200, [], \json_encode(['something' => 'dummy']))
        ]);

        $client = new Client(
            new GuzzleClient(['handler' => $mockHandler]),
            'test_token',
            'https://dummy.com'
        );

        $this->expectException(SonarFormatException::class);
        $client->query($this->createMock(QueryInterface::class));
    }
}