<?php

namespace SeanKndy\SonarApi\Resources;

class Discount extends BaseResource implements IdentityInterface
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
     * The amount of the `Discount`.
     */
    public int $amount;

    /**
     * The amount remaining that can be used.
     */
    public int $amountRemaining;

    /**
     * The ID of the company that this entity operates under.
     */
    public int $companyId;

    /**
     * If this discount was created due to reversal of a `Debit`, this field will link to the reversed `Debit`.
     */
    public ?int $debitId;

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
     * The total number of minutes.
     */
    public ?float $minutes;

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
     * The type of transaction on this service.
     */
    public ?string $serviceTransactionType;

    /**
     * Whether this entity's taxes have been committed or not.
     */
    public bool $taxCommitted;

    /**
     * The ID of an `TaxProvider`.
     */
    public ?int $taxProviderId;

    /**
     * The type.
     */
    public string $type;

    /**
     * The ID of the user who created this transaction.
     */
    public ?int $userId;

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
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A debit.
     */
    public ?Debit $debit;

    /**
     * A tax provider.
     */
    public ?TaxProvider $taxProvider;

    /**
     * The user that caused a reversal.
     */
    public ?User $reversedByUser;

    /**
     * A tax transaction.
     * @var \SeanKndy\SonarApi\Resources\TaxTransaction[]
     */
    public array $taxTransactions;

    /**
     * The application of a `Discount` or `Payment` against an `Invoice`.
     * @var \SeanKndy\SonarApi\Resources\Credit[]
     */
    public array $credits;

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