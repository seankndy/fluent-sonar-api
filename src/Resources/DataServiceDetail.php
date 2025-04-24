<?php

namespace SeanKndy\SonarApi\Resources;

class DataServiceDetail extends BaseResource implements IdentityInterface
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
     * How often this service bills, in months.
     */
    public int $billingFrequency;

    /**
     * The download speed of the service in kilobits per second.
     */
    public int $downloadSpeedKilobitsPerSecond;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * The FCC technology code for the service. Only relevant to US ISPs filing FCC Form 477.
     */
    public string $technologyCode;

    /**
     * The global service profile name for this service if using Telrad provisioning.
     */
    public ?string $telradGlobalServiceProfileName;

    /**
     * The upload speed of the service in kilobits per second.
     */
    public int $uploadSpeedKilobitsPerSecond;

    /**
     * The ID of a `UsageBasedBillingPolicy`.
     */
    public ?int $usageBasedBillingPolicyId;

    /**
     * A service.
     */
    public ?Service $service;

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