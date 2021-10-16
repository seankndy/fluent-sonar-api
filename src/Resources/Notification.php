<?php

namespace SeanKndy\SonarApi\Resources;

class Notification extends BaseResource
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
     * Whether this notification is read or unread.
     */
    public bool $isRead;

    /**
     * The ID of the entity that the notification is related to.
     */
    public ?int $notifiableId;

    /**
     * The type of entity that the notification is related to.
     */
    public ?string $notifiableType;

    /**
     * The type.
     */
    public string $type;

    /**
     * The ID of a User.
     */
    public int $userId;

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