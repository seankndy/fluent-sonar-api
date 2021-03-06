<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class RadiusGroup extends BaseResource implements IdentityInterface
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
     * The types of account statuses for accounts that are part of this grouping.
     */
    public string $accountStatus;

    /**
     * The delinquency state for accounts that are part of this grouping.
     */
    public string $delinquency;

    /**
     * Whether or not this is a fall through group.
     */
    public bool $fallThrough;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The RADIUS priority.
     */
    public int $priority;

    /**
     * An account group.
     * @var \SeanKndy\SonarApi\Resources\AccountGroup[]
     */
    public array $accountGroups;

    /**
     * The status of an account.
     * @var \SeanKndy\SonarApi\Resources\AccountStatus[]
     */
    public array $accountStatuses;

    /**
     * The account type.
     * @var \SeanKndy\SonarApi\Resources\AccountType[]
     */
    public array $accountTypes;

    /**
     * A service.
     * @var \SeanKndy\SonarApi\Resources\Service[]
     */
    public array $services;

    /**
     * A usage based billing policy.
     * @var \SeanKndy\SonarApi\Resources\UsageBasedBillingPolicy[]
     */
    public array $usageBasedBillingPolicies;

    /**
     * A RADIUS group reply attribute.
     * @var \SeanKndy\SonarApi\Resources\RadiusGroupReplyAttribute[]
     */
    public array $radiusGroupReplyAttributes;

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