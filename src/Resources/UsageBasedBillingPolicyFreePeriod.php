<?php

namespace SeanKndy\SonarApi\Resources;

class UsageBasedBillingPolicyFreePeriod extends BaseResource implements IdentityInterface
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
     * A day.
     */
    public string $day;

    /**
     * The end.
     */
    public string $end;

    /**
     * The start.
     */
    public string $start;

    /**
     * The ID of a `UsageBasedBillingPolicy`.
     */
    public int $usageBasedBillingPolicyId;

    /**
     * A usage based billing policy.
     */
    public ?UsageBasedBillingPolicy $usageBasedBillingPolicy;

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