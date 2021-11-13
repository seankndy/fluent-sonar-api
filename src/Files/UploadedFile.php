<?php

namespace SeanKndy\SonarApi\Files;

use Psr\Http\Message\ResponseInterface;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Exceptions\SonarFileUploadException;
use SeanKndy\SonarApi\Exceptions\SonarFormatException;
use SeanKndy\SonarApi\Exceptions\SonarHttpException;
use SeanKndy\SonarApi\Exceptions\SonarQueryException;
use SeanKndy\SonarApi\Mutations\Inputs\InputBuilder;
use SeanKndy\SonarApi\Resources\File;
use SeanKndy\SonarApi\Resources\IdentityInterface;

class UploadedFile
{
    private Client $client;

    public int $id;

    public string $name;

    public \DateTime $createdAt;

    public function __construct(Client $client, int $id, string $name)
    {
        $this->client = $client;
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = new \DateTime();
    }

    /**
     * @throws SonarFormatException
     * @throws SonarFileUploadException
     */
    public static function fromResponse(ResponseInterface $response, Client $client): self
    {
        $jsonObject = \json_decode($response->getBody()->getContents(), false);

        if (!$jsonObject || !isset($jsonObject->files)) {
            throw new SonarFormatException('Unknown API response formatting.');
        }

        if (!isset($jsonObject->files[0]) || !$jsonObject->files[0]->stored) {
            throw new SonarFileUploadException("Could not store uploaded file: " .
                isset($jsonObject->files[0]) ? $jsonObject->files[0]->failure_message : 'unknown error.');
        }

        return new self($client, $jsonObject->files[0]->id, $jsonObject->files[0]->filename);
    }

    /**
     * @throws SonarHttpException
     * @throws SonarFormatException
     * @throws SonarQueryException
     */
    public function associateResource(IdentityInterface $resource): void
    {
        $this->client
            ->mutations()
            ->linkFileToEntity([
                'input' => fn(InputBuilder $builder) => $builder->type('LinkFileToEntityMutationInput')->data([
                    'fileableType' => (new \ReflectionClass($resource))->getShortName(),
                    'fileableId' => $resource->id(),
                    'files' => [
                        ['file_id' => $this->id],
                    ],
                ])
            ])
            ->return(File::class, [
                'id',
            ])->run();
    }
}