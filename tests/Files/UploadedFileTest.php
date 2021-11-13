<?php

namespace SeanKndy\SonarApi\Tests\Files;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Exceptions\SonarFileUploadException;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
use SeanKndy\SonarApi\Files\UploadedFile;
use SeanKndy\SonarApi\Tests\TestCase;

class UploadedFileTest extends TestCase
{
    /** @test */
    public function it_throws_exception_when_creating_from_response_with_formatting_error()
    {
        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock
            ->method('getContents')
            ->willReturn(\json_encode([
                'whatever' => 'invalid response'
            ]));

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($streamMock);

        $this->expectException(SonarFormatException::class);

        UploadedFile::fromResponse(
            $responseMock,
            $this->createMock(Client::class),
        );
    }

    /** @test */
    public function it_throws_exception_when_creating_from_response_with_failure()
    {
        $streamMock = $this->createMock(StreamInterface::class);
        $streamMock
            ->method('getContents')
            ->willReturn(\json_encode([
                'files' => [
                    [
                        'stored' => false,
                        'failure_message' => 'File failed to upload.',
                    ]
                ]
            ]));

        $responseMock = $this->createMock(ResponseInterface::class);
        $responseMock->method('getBody')->willReturn($streamMock);

        $this->expectException(SonarFileUploadException::class);

        UploadedFile::fromResponse(
            $responseMock,
            $this->createMock(Client::class),
        );
    }
}
