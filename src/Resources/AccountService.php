<?php

namespace SeanKndy\SonarApi\Resources;

class AccountService extends BaseResource implements IdentityInterface
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
     * The number of billing cycles that have already been consumed by this particular service. This is only used for expiring services. NOTE: Typically this is the number of times billed but the value may be modified manually to adjust service expiration. See also the the `ExpiringServiceDetail` `times_to_run` field.
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
     * An Adtran Mosaic audit record.
     * @var \SeanKndy\SonarApi\Resources\AdtranMosaicAudit[]
     */
    public array $adtranMosaicAudits;

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
     * An account Adtran Mosaic service detail.
     * @var \SeanKndy\SonarApi\Resources\AccountAdtranMosaicServiceDetail[]
     */
    public array $accountAdtranMosaicServiceDetails;

    /**
     * Holds information for provisioning service on Calix devices.
     * @var \SeanKndy\SonarApi\Resources\AccountCalixServiceDetail[]
     */
    public array $accountCalixServiceDetails;

    /**
     * An inventory item.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $inventoryItems;

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