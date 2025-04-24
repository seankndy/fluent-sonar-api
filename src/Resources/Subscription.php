<?php

namespace SeanKndy\SonarApi\Resources;

class Subscription extends BaseResource implements IdentityInterface
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
     * When suspended, the subscription will not send notifications. Permission changes and other actions may cause a subscription to become suspended.
     */
    public bool $isSuspended;

    /**
     * The id of the entity that is being subscribed to.
     */
    public int $subscribableId;

    /**
     * The type of entity that is being subscribed to.
     */
    public string $subscribableType;

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