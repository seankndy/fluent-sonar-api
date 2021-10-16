<?php

namespace SeanKndy\SonarApi\Resources;

class UsageBasedBillingPolicy extends BaseResource
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
     * Whether or not a customer can purchase additional data usage capacity during a billing period.
     */
    public bool $allowPurchaseOfAdditionalCapacityDuringBillingPeriod;

    /**
     * Whether or not to assess charges for usage over the bandwidth limit at the end of the billing period.
     */
    public bool $assessChargesAtEndOfBillingPeriod;

    /**
     * The available data usage in this policy, measured in gigabytes.
     */
    public int $capInGigabytes;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Whether or not rollover is enabled.
     */
    public bool $rolloverEnabled;

    /**
     * Whether or not rollover expiration is enabled.
     */
    public ?bool $rolloverExpirationEnabled;

    /**
     * Rollover expires after this many months, if rollover expiration is enabled.
     */
    public ?int $rolloverExpirationMonths;

    /**
     * The ID of a Service.
     */
    public ?int $serviceId;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * Details regarding a specific data `Service`.
     * @var \SeanKndy\SonarApi\Resources\DataServiceDetail[]
     */
    public array $dataServiceDetails;

    /**
     * A period of free time in a `UsageBasedBillingPolicy`.
     * @var \SeanKndy\SonarApi\Resources\UsageBasedBillingPolicyFreePeriod[]
     */
    public array $usageBasedBillingPolicyFreePeriods;

    /**
     * An address list defines some criteria by which to group accounts for network policy enforcement.
     * @var \SeanKndy\SonarApi\Resources\AddressList[]
     */
    public array $addressLists;

    /**
     * A RADIUS group.
     * @var \SeanKndy\SonarApi\Resources\RadiusGroup[]
     */
    public array $radiusGroups;

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