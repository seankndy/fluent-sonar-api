<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class InstanceManagementRequest extends BaseResource implements IdentityInterface
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
     * The date until which the authorization is valid.
     */
    public ?string $authorizationValidUntil;

    /**
     * The reason.
     */
    public string $reason;

    /**
     * The date and time responded.
     */
    public ?\DateTime $respondedAt;

    /**
     * The id of the `User` that responded to the request.
     */
    public ?int $respondedByUserId;

    /**
     * A `User`.
     */
    public ?User $respondedByUser;

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