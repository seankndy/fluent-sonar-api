<?php

namespace SeanKndy\SonarApi\Resources;

class FccForm477Report extends BaseResource
{
    /**
     * The ID of the entity.
     */
    public int $id;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * A date
     */
    public string $date;

    /**
     * The format of the reporting for FCC Form 477.
     */
    public string $format;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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