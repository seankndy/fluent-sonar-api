<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class RadiusAccount extends BaseResource implements IdentityInterface
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * A password.
     */
    public ?string $password;

    /**
     * A username, used for authentication.
     */
    public string $username;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * An IP address assignment.
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

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

    /**
     * The history of a RADIUS session.
     * @var \SeanKndy\SonarApi\Resources\RadiusSessionHistory[]
     */
    public array $radiusSessionHistories;

}