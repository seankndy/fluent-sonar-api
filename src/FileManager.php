<?php

namespace SeanKndy\SonarApi;

use GuzzleHttp\Psr7\StreamWrapper;
use SeanKndy\SonarApi\Exceptions\SonarFileUploadException;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
use SeanKndy\SonarApi\Mutations\Inputs\InputBuilder;
use SeanKndy\SonarApi\Resources\File;
use SeanKndy\SonarApi\Resources\IdentityInterface;

class FileManager
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get stream of the file data for \SeanKndy\SonarApi\Resources\File $file.
     *
     * @return resource
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function fileStream(File $file)
    {
        $response = $this->client->request(
            'GET',
            'api/files/' . $file->id,
            [
                'headers' => ['Accept' => '*/*']
            ]
        );

        return StreamWrapper::getResource($response->getBody());
    }

    /**
     * Upload a file to Sonar and associate it a resource.  Return the Sonar File resource
     * representing the file.
     *
     * @param resource|string $fileOrStream Stream of the file to upload or path to file.
     * @param IdentityInterface $associatedResource Resource to associate to the uploaded file.
     * @throws Exceptions\SonarHttpException
     * @throws SonarFormatException
     * @throws SonarFileUploadException
     */
    public function uploadFile(
        $fileOrStream,
        string $name,
        IdentityInterface $associatedResource
    ): File {
        if (!\is_resource($fileOrStream) && !($fileOrStream = @\fopen($fileOrStream, 'r'))) {
            throw new \RuntimeException("The file given does not exist or is not readable.");
        }

        $response = $this->client->request(
            'POST',
            'api/files',
            [
                'multipart' => [
                    [
                        'name' => 'files[]',
                        'contents' => $fileOrStream,
                        'filename' => $name,
                    ]
                ],
            ]
        );

        $jsonObject = \json_decode($response->getBody()->getContents(), false);

        if (!isset($jsonObject->files)) {
            throw new SonarFormatException('Unknown API response formatting.');
        }

        if (!isset($jsonObject->files[0]) || !$jsonObject->files[0]->stored) {
            throw new SonarFileUploadException("Could not store uploaded file: " .
                isset($jsonObject->files[0]) ? $jsonObject->files[0]->failure_message : 'unknown error.');
        }

        return $this->client
            ->mutations()
            ->linkFileToEntity([
                'input' => fn(InputBuilder $builder) => $builder->type('LinkFileToEntityMutationInput')->data([
                    'fileableType' => (new \ReflectionClass($associatedResource))->getShortName(),
                    'fileableId' => $associatedResource->id(),
                    'files' => [
                        ['file_id' => $jsonObject->files[0]->id],
                    ],
                ])
            ])
            ->return(File::class, [
                'id',
                'createdAt',
                'updatedAt',
            ])->run();
    }
}