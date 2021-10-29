<?php

namespace SeanKndy\SonarApi\Tests;

use GuzzleHttp\Middleware as GuzzleMiddleware;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
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
use SeanKndy\SonarApi\Resources\BillingSetting;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;

class ClientTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated_with_query_builders()
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
    public function it_can_be_instantiated_with_an_overriding_query_builder()
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
        $handlerStack = HandlerStack::create(new MockHandler([
            new Response(200, [], \json_encode(['data' => []]))
        ]));
        $container = [];
        $handlerStack->push(GuzzleMiddleware::history($container));

        $client = new Client(
            new GuzzleClient(['handler' => $handlerStack]),
            'test_api_token',
            'https://dummy.com'
        );

        $client->query($this->createMock(QueryInterface::class));

        $this->assertCount(1, $container);
        $this->assertEquals('POST', $container[0]['request']->getMethod());
        $this->assertEquals('https://dummy.com/api/graphql', $container[0]['request']->getUri());
        $this->assertEquals('Bearer test_api_token', $container[0]['request']->getHeaders()['Authorization'][0]);
        $this->assertEquals('application/json', $container[0]['request']->getHeaders()['Accept'][0]);

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

    /** @test */
    public function it_will_throw_exception_if_non_resource_class_passed_to_newQuery()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'testtoken',
            'https://dummy.com'
        );

        $this->expectException(\InvalidArgumentException::class);
        $client->newQuery(DummyClass::class);
    }

    /** @test */
    public function it_sets_object_name_in_query_builder_to_snaked_resource_class_name_when_calling_newQuery()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'testtoken',
            'https://dummy.com'
        );

        $query = $client->newQuery(BillingSetting::class);

        $this->assertEquals('billing_setting', $query->getObjectName());
    }
}

class DummyClass
{
}