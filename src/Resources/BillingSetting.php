<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class BillingSetting extends BaseResource implements IdentityInterface
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
     * How often the accounting period automatically closes.
     */
    public string $accountingPeriodAutoClose;

    /**
     * The date that the accounting period was closed.
     */
    public ?string $accountingPeriodCloseDate;

    /**
     * Always round taxes up.
     */
    public bool $alwaysRoundTaxesUp;

    /**
     * Whether or not to apply a late fee to past due invoices.
     */
    public bool $applyLateFees;

    /**
     * Whether late fees should be applied to child invoices.
     */
    public bool $applyLateFeesToChildInvoices;

    /**
     * The number of times to attempt a bank account automatic payment.
     */
    public int $autopayBankAccountAttempts;

    /**
     * The number of days between retries for bank account automatic payments.
     */
    public int $autopayBankAccountRetryIntervalInDays;

    /**
     * The number of times to attempt a credit card automatic payment.
     */
    public int $autopayCreditCardAttempts;

    /**
     * The number of days between retries for credit card automatic payments.
     */
    public int $autopayCreditCardRetryIntervalInDays;

    /**
     * Whether the automatic payment process should just run the invoice amount, or the entire amount due on the account.
     */
    public bool $autopayRunsEntireAmountDue;

    /**
     * Whether or not the daily billing process is enabled.
     */
    public bool $dailyBilling;

    /**
     * The number of days after the due date on a delinquent invoice for a late fee to be applied.
     */
    public ?int $daysAfterInvoiceDueForLateFeeApplication;

    /**
     * Whether or not to delete expired credit cards from Sonar.
     */
    public bool $deleteExpiredCreditCards;

    /**
     * Friday.
     */
    public bool $delinquencyCheckDayFriday;

    /**
     * Monday.
     */
    public bool $delinquencyCheckDayMonday;

    /**
     * Saturday.
     */
    public bool $delinquencyCheckDaySaturday;

    /**
     * Sunday.
     */
    public bool $delinquencyCheckDaySunday;

    /**
     * Thursday.
     */
    public bool $delinquencyCheckDayThursday;

    /**
     * Tuesday.
     */
    public bool $delinquencyCheckDayTuesday;

    /**
     * Wednesday.
     */
    public bool $delinquencyCheckDayWednesday;

    /**
     * The `AccountStatus` for disconnected accounts.
     */
    public int $disconnectAccountStatusId;

    /**
     * Whether to exclude inactive accounts from late fee application.
     */
    public bool $excludeInactiveAccountsFromLateFees;

    /**
     * Generate an invoice on an account when it is first activated, if there are any uninvoiced debits.
     */
    public bool $generateInvoiceOnInitialActivation;

    /**
     * Whether to invoice and email late fees immediately, or add them to the next invoice.
     */
    public bool $invoiceAndEmailLateFeesImmediately;

    /**
     * The minimum amount an invoice must be past due for a late fee to be applied.
     */
    public ?int $lateFeeMinimumDelinquencyAmount;

    /**
     * The mode for late fee application.
     */
    public string $lateFeeMode;

    /**
     * If late fees are applied as a percentage, the percentage of the past due balance to apply.
     */
    public ?float $lateFeePercentage;

    /**
     * The ID of a one time `Service` to use for late fee application.
     */
    public ?int $lateFeeServiceId;

    /**
     * The minimum account an invoice must be delinquent for before being flagged delinquent.
     */
    public int $minimumAmountDueForDelinquency;

    /**
     * The smallest bank account payment amount allowed.
     */
    public int $minimumBankAccountPayment;

    /**
     * The smallest credit card payment amount allowed.
     */
    public int $minimumCreditCardPayment;

    /**
     * The service ID of a one time `Service` to charge for accounts with `print_invoice` enabled in their `AccountBillingParameter`.
     */
    public ?int $printedInvoiceFeeServiceId;

    /**
     * Whether or not changing the status from an active to inactive status is prorated by default.
     */
    public bool $prorateAccountStatusChange;

    /**
     * Whether or not changing an account bill day is prorated by default.
     */
    public bool $prorateBillingDayChange;

    /**
     * Whether or not service quantity changes are prorated by default.
     */
    public bool $prorateServiceQuantity;

    /**
     * Whether or not service addition and removal is prorated by default.
     */
    public bool $prorateServices;

    /**
     * Whether or not to round prorated transactions to the nearest major unit (e.g. to the nearest dollar, euro, pound, etc.)
     */
    public bool $roundProratedAmounts;

    /**
     * The service used for late fee application.
     */
    public ?Service $lateFeeService;

    /**
     * The service used for printed invoices.
     */
    public ?Service $printedInvoiceService;

    /**
     * The account status used when moving accounts into the post-delinquency state.
     */
    public ?AccountStatus $disconnectAccountStatus;

    /**
     * The account type.
     * @var \SeanKndy\SonarApi\Resources\AccountType[]
     */
    public array $accountTypes;

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