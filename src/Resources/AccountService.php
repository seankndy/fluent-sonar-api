<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AccountService extends BaseResource implements IdentityInterface
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
     * If this service was prorated when added, this is the date it was prorated from.
     */
    public ?string $additionProrateDate;

    /**
     * The date data usage was last calculated.
     */
    public ?string $dataUsageLastCalculatedDate;

    /**
     * Overriding the service name will alter the service name printed on an invoice.
     */
    public ?string $nameOverride;

    /**
     * The next date this service will bill. If this is null, it will bill on the next account billing date.
     */
    public ?string $nextBillDate;

    /**
     * The number of times this particular service has been billed to the customer. This is only used for expiring services.
     */
    public ?int $numberOfTimesBilled;

    /**
     * The ID of a `Package`.
     */
    public ?int $packageId;

    /**
     * The amount that this service price has been overridden to. If this is null, then the service price is used.
     */
    public ?int $priceOverride;

    /**
     * The reason that the price of a service has been overridden.
     */
    public ?string $priceOverrideReason;

    /**
     * The quantity for this service.
     */
    public int $quantity;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * A unique ID that describes this unique instance of a `Package` assignment.
     */
    public ?string $uniquePackageRelationshipId;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * A collection of `Service`s.
     */
    public ?Package $package;

    /**
     * The value of a `ServiceMetadata` field, as it relates to a specific `Service` on a specific `Account`.
     * @var \SeanKndy\SonarApi\Resources\ServiceMetadataValue[]
     */
    public array $serviceMetadataValues;

    /**
     * A voice service configuration that links a service parameter to an account.
     * @var \SeanKndy\SonarApi\Resources\AccountVoiceServiceDetail[]
     */
    public array $accountVoiceServiceDetails;

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