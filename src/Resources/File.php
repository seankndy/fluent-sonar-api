<?php

namespace SeanKndy\SonarApi\Resources;

class File extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * A human readable description.
     */
    public ?string $description;

    /**
     * The file size, in bytes.
     */
    public int $fileSizeInBytes;

    /**
     * The ID of the entity that owns this file.
     */
    public ?int $fileableId;

    /**
     * The type of entity that owns this file.
     */
    public ?string $fileableType;

    /**
     * The file name.
     */
    public string $filename;

    /**
     * The MIME type of the file.
     */
    public string $mimeType;

    /**
     * An image file may be set to the primary image. This will be used as the displayed image for the object that this file is associated to throughout Sonar.
     */
    public bool $primaryImage;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

    /**
     * A log entry.
     * @var \SeanKndy\SonarApi\Resources\Log[]
     */
    public array $logs;

    /**
     * An access log history on an entity.
     * @var \SeanKndy\SonarApi\Resources\AccessLog[]
     */
    public array $accessLogs;

}