<?php

namespace SeanKndy\SonarApi\Resources;

class Invoice extends BaseResource
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
     * The number of times that auto pay has been attempted.
     */
    public int $autoPayAttempts;

    /**
     * The date that auto pay will be attempted.
     */
    public ?string $autoPayDate;

    /**
     * The sum of all due amounts on child invoices.
     */
    public int $childInvoiceRemainingDue;

    /**
     * The ID of the company that this entity operates under.
     */
    public int $companyId;

    /**
     * A date
     */
    public string $date;

    /**
     * The date that this became delinquent.
     */
    public ?string $delinquencyDate;

    /**
     * Whether or not this entity is delinquent.
     */
    public bool $delinquent;

    /**
     * The date this invoice is due by.
     */
    public string $dueDate;

    /**
     * The date that this ends.
     */
    public string $endDate;

    /**
     * If an invoice is frozen, payments will not be automatically applied to it, and it cannot be modified.
     */
    public bool $frozen;

    /**
     * Whether or not a late fee has been applied.
     */
    public bool $lateFeeApplied;

    /**
     * Whether or not the invoice includes only late fees.
     */
    public bool $lateFeeOnly;

    /**
     * The message.
     */
    public ?string $message;

    /**
     * The number of months of service this invoice was billed for.
     */
    public int $numberOfMonths;

    /**
     * The ID of the `Invoice` that is this `Invoice`s master.
     */
    public ?int $parentInvoiceId;

    /**
     * The amount remaining to be paid.
     */
    public int $remainingDue;

    /**
     * Whether this entity's taxes have been committed or not.
     */
    public bool $taxCommitted;

    /**
     * The ID of an `TaxProvider`.
     */
    public ?int $taxProviderId;

    /**
     * The sum of all debits that make up this invoice.
     */
    public int $totalDebits;

    /**
     * The sum of all taxes on debits that make up this invoice.
     */
    public int $totalTaxes;

    /**
     * Whether or not this entity has been voided.
     */
    public bool $void;

    /**
     * When this was voided.
     */
    public ?\DateTime $voidedAt;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * A tax provider.
     */
    public ?TaxProvider $taxProvider;

    /**
     * The `Invoice` that is the parent of this `Invoice`.
     */
    public ?Invoice $parentInvoice;

    /**
     * A debit.
     * @var \SeanKndy\SonarApi\Resources\Debit[]
     */
    public array $debits;

    /**
     * The application of a `Discount` or `Payment` against an `Invoice`.
     * @var \SeanKndy\SonarApi\Resources\Credit[]
     */
    public array $credits;

    /**
     * A list of `Invoice`s that this `Invoice` is a parent of.
     * @var \SeanKndy\SonarApi\Resources\Invoice[]
     */
    public array $childInvoices;

    /**
     * A record of a monthly billing cycle.
     */
    public ?MonthlyBillingCompletion $monthlyBillingCompletion;

    /**
     * An `Email` that is sent when a particular event occurs.
     * @var \SeanKndy\SonarApi\Resources\TriggeredEmail[]
     */
    public array $triggeredEmails;

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