<?php

namespace SeanKndy\SonarApi\Resources;

class Note extends BaseResource implements IdentityInterface
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
     * The message.
     */
    public string $message;

    /**
     * The ID of the entity that owns this note.
     */
    public int $noteableId;

    /**
     * The type of entity that owns this note.
     */
    public string $noteableType;

    /**
     * The priority of this item.
     */
    public string $priority;

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