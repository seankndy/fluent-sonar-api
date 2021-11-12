<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class Service extends BaseResource implements IdentityInterface
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
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public ?int $amount;

    /**
     * How this is applied.
     */
    public string $application;

    /**
     * The ID of the company that this entity operates under.
     */
    public ?int $companyId;

    /**
     * If the amount for this service is zero, it will still display on invoices.
     */
    public bool $displayIfZero;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The ID of a GeneralLedgerCode.
     */
    public ?int $generalLedgerCodeId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a tax definition on a reversed transaction.
     */
    public ?int $reverseTaxDefinitionId;

    /**
     * The ID of a tax definition on a transaction.
     */
    public ?int $taxDefinitionId;

    /**
     * The type.
     */
    public string $type;

    /**
     * Details regarding a specific recurring `Service`.
     */
    public ?RecurringServiceDetail $recurringServiceDetail;

    /**
     * Details regarding a specific expiring `Service`.
     */
    public ?ExpiringServiceDetail $expiringServiceDetail;

    /**
     * Details about an adjustment `Service`.
     */
    public ?AdjustmentServiceDetail $adjustmentServiceDetail;

    /**
     * Details regarding a specific data `Service`.
     */
    public ?DataServiceDetail $dataServiceDetail;

    /**
     * Details regarding a specific voice `Service`.
     */
    public ?VoiceServiceDetail $voiceServiceDetail;

    /**
     * Details regarding a specific overage `Service`.
     */
    public ?OverageServiceDetail $overageServiceDetail;

    /**
     * A general ledger code.
     */
    public ?GeneralLedgerCode $generalLedgerCode;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * The relationship between an `Account` and a `Service`.
     * @var \SeanKndy\SonarApi\Resources\AccountService[]
     */
    public array $accountServices;

    /**
     * Fields that store metadata about individual instances of `Service`s.
     * @var \SeanKndy\SonarApi\Resources\ServiceMetadata[]
     */
    public array $serviceMetadata;

    /**
     * A discount.
     * @var \SeanKndy\SonarApi\Resources\Discount[]
     */
    public array $discounts;

    /**
     * A debit.
     * @var \SeanKndy\SonarApi\Resources\Debit[]
     */
    public array $debits;

    /**
     * A direct inward dial (DID) assignment.
     * @var \SeanKndy\SonarApi\Resources\DidAssignment[]
     */
    public array $didAssignments;

    /**
     * A historical record of a direct inward dial (DID) assignment.
     * @var \SeanKndy\SonarApi\Resources\DidAssignmentHistory[]
     */
    public array $didAssignmentHistories;

    /**
     * The relationship between a `Service` and a `Tax`.
     * @var \SeanKndy\SonarApi\Resources\ServiceTax[]
     */
    public array $serviceTaxes;

    /**
     * The `TaxDefinition` pair associated to this entity.
     * @var \SeanKndy\SonarApi\Resources\ServiceTaxDefinition[]
     */
    public array $taxDefinitions;

    /**
     * A `Service` associated with a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobService[]
     */
    public array $jobServices;

    /**
     * The relationship between a `Package` and a `Service`.
     * @var \SeanKndy\SonarApi\Resources\PackageService[]
     */
    public array $packageServices;

    /**
     * A usage based billing policy.
     * @var \SeanKndy\SonarApi\Resources\UsageBasedBillingPolicy[]
     */
    public array $usageBasedBillingPolicies;

    /**
     * A set of vendor items attached to an entity.
     * @var \SeanKndy\SonarApi\Resources\VendorItem[]
     */
    public array $vendorItems;

    /**
     * An account group.
     * @var \SeanKndy\SonarApi\Resources\AccountGroup[]
     */
    public array $accountGroups;

    /**
     * A RADIUS group.
     * @var \SeanKndy\SonarApi\Resources\RadiusGroup[]
     */
    public array $radiusGroups;

    /**
     * An address list defines some criteria by which to group accounts for network policy enforcement.
     * @var \SeanKndy\SonarApi\Resources\AddressList[]
     */
    public array $addressLists;

    /**
     * The type of a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobType[]
     */
    public array $jobTypes;

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