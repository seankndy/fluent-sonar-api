<?php

namespace SeanKndy\SonarApi\Resources;

class AccessLog extends BaseResource implements IdentityInterface
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
     * The date and time that this entity was accessed.
     */
    public \DateTime $accessDatetime;

    /**
     * The ID of the entity that this access log belongs to.
     */
    public ?int $accessloggableId;

    /**
     * The entity that this access log belongs to.
     */
    public ?string $accessloggableType;

    /**
     * The ID of the entity that this access log belongs to.
     */
    public ?int $entityId;

    /**
     * The entity that this access log belongs to.
     */
    public ?string $entityName;

    /**
     * The ID of the user that accessed this entity.
     */
    public int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

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