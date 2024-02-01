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
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Exceptions\SonarFileUploadException;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
use SeanKndy\SonarApi\Exceptions\SonarHttpException;
use SeanKndy\SonarApi\Exceptions\SonarQueryException;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Queries\QueryInterface;
use SeanKndy\SonarApi\Resources\Account;
use SeanKndy\SonarApi\Resources\BillingSetting;
use SeanKndy\SonarApi\Resources\File;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;
use org\bovigo\vfs\vfsStream;

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
    public function it_sets_timeout()
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

        $client->query($this->createConfiguredMock(QueryInterface::class, [
            'timeout' => 12.5,
        ]));

        $this->assertCount(1, $container);
        $this->assertEquals(12.5, $container[0]['options']['timeout']);
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

    /** @test */
    public function it_sets_authorization_and_accept_headers_in_request()
    {
        $guzzleMock = $this->createMock(GuzzleClient::class);

        $guzzleMock
            ->expects($this->once())
            ->method('request')
            ->with(
                $this->anything(),
                $this->anything(),
                $this->callback(function ($arg) {
                    return $arg['headers'] == [
                        'Authorization' => 'Bearer testtoken',
                        'Accept' => 'application/json',
                    ];
                })
            );

        $client = new Client(
            $guzzleMock,
            'testtoken',
            'https://dummy.com'
        );

        $client->request('POST', 'foo/bar');
    }

    /** @test */
    public function it_allows_header_overrides()
    {
        $guzzleMock = $this->createMock(GuzzleClient::class);

        $guzzleMock
            ->expects($this->once())
            ->method('request')
            ->with(
                $this->anything(),
                $this->anything(),
                $this->callback(function ($arg) {
                    return $arg['headers'] == [
                        'Authorization' => 'foo',
                        'Accept' => '*/*',
                        'X-Something-Else' => 'bar',
                    ];
                })
            );

        $client = new Client(
            $guzzleMock,
            'testtoken',
            'https://dummy.com'
        );

        $client->request('POST', 'foo/bar', [
            'headers' => [
                'Authorization' => 'foo',
                'Accept' => '*/*',
                'X-Something-Else' => 'bar',
            ]
        ]);
    }

    /** @test */
    public function it_makes_request_to_the_provided_sonar_url()
    {
        $guzzleMock = $this->createMock(GuzzleClient::class);

        $guzzleMock
            ->expects($this->once())
            ->method('request')
            ->with(
                $this->anything(),
                'https://dummy.com/foo/bar',
               $this->anything()
            );

        $client = new Client(
            $guzzleMock,
            'testtoken',
            'https://dummy.com'
        );

        $client->request('POST', 'foo/bar');
    }

    /** @test */
    public function it_does_return_file_stream_resource()
    {
        $guzzleMock = $this->createMock(GuzzleClient::class);
        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock->method('isWritable')->willReturn(true);
        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($streamMock);

        $guzzleMock
            ->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                'https://dummy.com/api/files/12345',
                $this->callback(function ($arg) {
                    return $arg['headers']['Accept'] == '*/*';
                })
            )
            ->willReturn($responseMock);

        $client = new Client(
            $guzzleMock,
            'testtoken',
            'https://dummy.com'
        );

        $file = new File();
        $file->id = 12345;
        $resource = $client->fileStream($file);

        $this->assertIsResource($resource);
    }

    /** @test */
    public function it_throws_exception_during_file_upload_with_unknown_response()
    {
        $handlerStack = HandlerStack::create(new MockHandler([
            new Response(200, [], \json_encode(['foo' => []]))
        ]));
        $container = [];
        $handlerStack->push(GuzzleMiddleware::history($container));

        $client = new Client(
            new GuzzleClient(['handler' => $handlerStack]),
            'test_api_token',
            'https://dummy.com'
        );

        $account = new Account();
        $account->id = 1234;

        $this->expectException(SonarFormatException::class);

        $client->uploadFile(\fopen('php://memory', 'r+'), 'foobar');
    }

    /** @test */
    public function it_accepts_resource_stream_for_file_upload()
    {
        $handlerStack = HandlerStack::create(new MockHandler([
            // file upload response
            new Response(200, [], \json_encode(['files' => [
                [
                    'id' => 1000,
                    'filename' => 'testing',
                    'stored' => true,
                    'failure_message' => null,
                ]
            ]])),
            // file association response
            new Response(200, [], \json_encode(['data' => [
                'linkFileToEntity' => [
                    'id' => 1000,
                    'created_at' => '2017-01-01T12:33:12+04:00',
                    'updated_at' => '2017-01-01T12:33:12+04:00',
                ]
            ]]))
        ]));
        $container = [];
        $handlerStack->push(GuzzleMiddleware::history($container));

        $client = new Client(
            new GuzzleClient(['handler' => $handlerStack]),
            'test_api_token',
            'https://dummy.com'
        );

        $account = new Account();
        $account->id = 1234;

        $file = $client->uploadFile(
            \fopen('php://memory', 'r'),
            'testing'
        );

        $this->assertEquals(1000, $file->id);
    }

    /** @test */
    public function it_throws_exception_when_nonexistent_file_path_provided_during_upload()
    {
        $client = new Client(
            $this->createMock(GuzzleClient::class),
            'test_api_token',
            'https://dummy.com'
        );

        $account = new Account();
        $account->id = 1234;

        $this->expectException(\RuntimeException::class);
        $client->uploadFile(
            '/some/invalid/file/928341ajhdfalkdjh',
            'testing'
        );
    }

    /** @test */
    public function it_accepts_file_path_for_file_upload()
    {
        $handlerStack = HandlerStack::create(new MockHandler([
            // file upload response
            new Response(200, [], \json_encode(['files' => [
                [
                    'id' => 1000,
                    'filename' => 'testing',
                    'stored' => true,
                    'failure_message' => null,
                ]
            ]])),
            // file association response
            new Response(200, [], \json_encode(['data' => [
                'linkFileToEntity' => [
                    'id' => 1000,
                    'created_at' => '2017-01-01T12:33:12+04:00',
                    'updated_at' => '2017-01-01T12:33:12+04:00',
                ]
            ]]))
        ]));
        $container = [];
        $handlerStack->push(GuzzleMiddleware::history($container));

        $client = new Client(
            new GuzzleClient(['handler' => $handlerStack]),
            'test_api_token',
            'https://dummy.com'
        );

        $root = vfsStream::setup('test');
        vfsStream::newFile('testing')->at($root)->setContent('blah');

        $account = new Account();
        $account->id = 1234;

        $uploadedFile = $client->uploadFile(
            vfsStream::url('testing'),
            'testing'
        );

        $this->assertEquals(1000, $uploadedFile->id);
    }
}

class DummyClass
{
}