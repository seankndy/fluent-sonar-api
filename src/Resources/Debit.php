<?php

namespace SeanKndy\SonarApi\Resources;

class Debit extends BaseResource
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $amount;

    /**
     * The ID of the company that this entity operates under.
     */
    public int $companyId;

    /**
     * A human readable description.
     */
    public ?string $description;

    /**
     * A general ledger code.
     */
    public ?string $generalLedgerCode;

    /**
     * A general ledger code description.
     */
    public ?string $generalLedgerCodeDescription;

    /**
     * The ID of an `Invoice`.
     */
    public ?int $invoiceId;

    /**
     * The total number of minutes.
     */
    public ?float $minutes;

    /**
     * The number of months of service this invoice was billed for.
     */
    public int $numberOfMonths;

    /**
     * The date this transaction was prorated from.
     */
    public ?string $proratedFrom;

    /**
     * The date this transaction was prorated to.
     */
    public ?string $proratedTo;

    /**
     * The quantity for this service.
     */
    public int $quantity;

    /**
     * The quantity the associated service had before the quantity was changed and prorated.
     */
    public ?int $quantityProratedFrom;

    /**
     * The quantity the associated service was changed to when the quantity was changed and prorated.
     */
    public ?int $quantityProratedTo;

    /**
     * Whether or not this has been reversed.
     */
    public bool $reversed;

    /**
     * When this was reversed.
     */
    public ?\DateTime $reversedAt;

    /**
     * The user ID that reversed this.
     */
    public ?int $reversedByUserId;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * The name of a service.
     */
    public string $serviceName;

    /**
     * The type.
     */
    public string $type;

    /**
     * The ID of the user who created this transaction.
     */
    public ?int $userId;

    /**
     * The ID of a voice service configuration parameter.
     */
    public ?int $voiceServiceGenericParameterId;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * A configurable attribute for a voice service.
     */
    public ?VoiceServiceGenericParameter $voiceServiceGenericParameter;

    /**
     * An invoice.
     */
    public ?Invoice $invoice;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * The user that caused a reversal.
     */
    public ?User $reversedByUser;

    /**
     * A discount.
     */
    public ?Discount $discount;

    /**
     * A data usage top off.
     */
    public ?DataUsageTopOff $dataUsageTopOff;

    /**
     * A tax transaction.
     * @var \SeanKndy\SonarApi\Resources\TaxTransaction[]
     */
    public array $taxTransactions;

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
     * A fractional debit, stored to accurately calculate multi month billing.
     * @var \SeanKndy\SonarApi\Resources\FractionalDebit[]
     */
    public array $fractionalDebits;

}