<?php

namespace SeanKndy\SonarApi\Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware as GuzzleMiddleware;
use GuzzleHttp\Psr7\Response;
use http\Exception\RuntimeException;
use org\bovigo\vfs\vfsStream;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Exceptions\SonarFileUploadException;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
use SeanKndy\SonarApi\Resources\Account;
use SeanKndy\SonarApi\Resources\File;

class FileManagerTest extends TestCase
{
    /** @test */
    public function it_makes_http_request_to_sonars_files_api_and_returns_resource()
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

        $fileManager = $client->fileManager();
        $file = new File();
        $file->id = 12345;

        $resource = $fileManager->fileStream($file);

        $this->assertIsResource($resource);
    }

    /** @test */
    public function it_throws_format_exception_with_unknown_response_during_upload()
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

        $client->fileManager()->uploadFile(
            \fopen('php://memory', 'r+'),
            'foobar',
            $account
        );
    }

    /** @test */
    public function it_throws_upload_exception_with_failed_response_during_upload()
    {
        $handlerStack = HandlerStack::create(new MockHandler([
            new Response(200, [], \json_encode(['files' => [
                [
                    'stored' => false,
                    'failure_message' => 'File failed to upload.',
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

        $this->expectException(SonarFileUploadException::class);

        $client->fileManager()->uploadFile(
            \fopen('php://memory', 'r+'),
            'foobar',
            $account
        );
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

        $fileManager = $client->fileManager();

        $account = new Account();
        $account->id = 1234;

        $file = $fileManager->uploadFile(
            \fopen('php://memory', 'r'),
            'testing',
            $account
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

        $fileManager = $client->fileManager();

        $account = new Account();
        $account->id = 1234;

        $this->expectException(\RuntimeException::class);
        $fileManager->uploadFile(
            '/some/invalid/file/928341ajhdfalkdjh',
            'testing',
            $account
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

        $fileManager = $client->fileManager();

        $account = new Account();
        $account->id = 1234;

        $file = $fileManager->uploadFile(
            vfsStream::url('testing'),
            'testing',
            $account
        );

        $this->assertEquals(1000, $file->id);
    }
}