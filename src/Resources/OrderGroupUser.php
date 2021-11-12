<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class OrderGroupUser extends BaseResource implements IdentityInterface
{
    use HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Whether a user is authorized to approve purchase orders created in this order group.
     */
    public bool $isApprover;

    /**
     * The ID of an order group.
     */
    public int $orderGroupId;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * An order group.
     */
    public ?OrderGroup $orderGroup;

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