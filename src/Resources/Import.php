<?php

namespace SeanKndy\SonarApi\Resources;

class Import extends BaseResource implements IdentityInterface
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
     * The last date and time this entity was updated, or was the subject of a log.
     */
    public ?\DateTime $globalUpdatedAt;

    /**
     * The ID of the entity that owns this import.
     */
    public int $importrecipeableId;

    /**
     * The type of entity that owns this import.
     */
    public string $importrecipeableType;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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