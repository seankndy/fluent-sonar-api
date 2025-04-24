<?php

namespace SeanKndy\SonarApi\Resources;

class Log extends BaseResource implements IdentityInterface
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
     * Current data.
     */
    public string $current;

    /**
     * Whether or not this log was transferred from a Sonar v1 instance. If so, the formatting will not match current version logs.
     */
    public bool $legacy;

    /**
     * A title which is only populated on logs that were imported from Sonar v1.
     */
    public ?string $legacyTitle;

    /**
     * The severity level.
     */
    public string $level;

    /**
     * The ID of the entity that this log is attached to.
     */
    public int $loggableId;

    /**
     * The type of entity that this log is attached to.
     */
    public string $loggableType;

    /**
     * The entity ID that triggered the log.
     */
    public int $loggedEntityId;

    /**
     * The entity that triggered the log.
     */
    public string $loggedEntityType;

    /**
     * The message.
     */
    public ?string $message;

    /**
     * Previous data.
     */
    public ?string $previous;

    /**
     * Data from objects related to this change.
     */
    public ?string $relationData;

    /**
     * The type.
     */
    public string $type;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

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