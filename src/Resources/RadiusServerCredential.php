<?php

namespace SeanKndy\SonarApi\Resources;

class RadiusServerCredential extends BaseResource
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
     * The credential name.
     */
    public string $credential;

    /**
     * The ID of a `RadiusServer`.
     */
    public int $radiusServerId;

    /**
     * The value.
     */
    public string $value;

    /**
     * A RADIUS server.
     */
    public ?RadiusServer $radiusServer;

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