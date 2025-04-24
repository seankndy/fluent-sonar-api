<?php

namespace SeanKndy\SonarApi\Resources;

class BillingDefault extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;
    use Traits\HasAddresses;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * The ID of an AccountType.
     */
    public ?int $accountTypeId;

    /**
     * Whether or not to aggregate invoice taxes instead of printing with each charge.
     */
    public bool $aggregateInvoiceTaxes;

    /**
     * Whether or not to aggregate linked debits on Anchor invoices.
     */
    public bool $aggregateLinkedDebits;

    /**
     * The ID of a BillingDefault acting as an Anchor default.
     */
    public ?int $anchorDefaultId;

    /**
     * Determines if delinquency settings on an Anchor default is applied only to the Anchor account or the Linked accounts as well.
     */
    public ?string $anchorDelinquencyLogic;

    /**
     * If `invoice_day` is not null, this allows you to select whether `auto_pay_days` is calculated from the billing day, or the invoice day.
     */
    public string $autoPayDay;

    /**
     * The number of days after `auto_pay_day` that autopay runs for an invoice.
     */
    public int $autoPayDays;

    /**
     * The day that billing runs.
     */
    public ?int $billDay;

    /**
     * Whether the account bill and invoice day are fixed, the account activation day is used as bill day, or the account activation day is used as the invoice day.
     */
    public string $billDayMode;

    /**
     * The type of bill this account receives.
     */
    public string $billMode;

    /**
     * If `switch_status_after_delinquency` is `true`, then this is the number of days of delinquency to allow before the status switch.
     */
    public ?int $daysOfDelinquencyForStatusSwitch;

    /**
     * If this is `true`, then this is the default billing default that is used, if there is no more specific billing default option for an account.
     */
    public bool $default;

    /**
     * Determines if the billing parameters apply by account type or for anchor / linked types.
     */
    public string $defaultFor;

    /**
     * If `switch_status_after_delinquency` is true, this is the account status that the account will be moved into after `days_of_delinquency_for_status_switch` days of delinquency.
     */
    public ?int $delinquencyAccountStatusId;

    /**
     * If `switch_status_after_delinquency` is `true`, then this is the status the account will be moved back into if delinquency is cleared while the account is set to the `delinquency_account_status_id` account status.
     */
    public ?int $delinquencyRemovalAccountStatusId;

    /**
     * The number of days after the invoice date that it is due.
     */
    public int $dueDays;

    /**
     * If `invoice_day` is not null, this allows you to select whether `due_days` is calculated from the billing day, or the invoice day.
     */
    public string $dueDaysDay;

    /**
     * Whether or not to use a fixed bill day, versus anniversary day billing. Use `bill_day_mode` for further customization.
     */
    public ?bool $fixedBillDay;

    /**
     * The number of days after the invoice due date that the invoice is marked delinquent.
     */
    public int $graceDays;

    /**
     * The day that automatic billing invoices are generated for. If this is `null`, then `bill_day` is used.
     */
    public ?int $invoiceDay;

    /**
     * Whether or not this account participates in the federal Lifeline program.
     */
    public bool $lifeline;

    /**
     * The number of months to bill at a time.
     */
    public int $monthsToBill;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Whether this account receives a printed invoice.
     */
    public bool $printInvoice;

    /**
     * Whether or not this account should be moved into another status after being delinquent for a preset period.
     */
    public bool $switchStatusAfterDelinquency;

    /**
     * Whether or not this account is tax exempt.
     */
    public bool $taxExempt;

    /**
     * The status that an `Account` is moved into after a certain length of delinquency.
     */
    public ?AccountStatus $delinquencyAccountStatus;

    /**
     * The `AccountStatus` an account is moved back into after no longer being delinquent, if it is currently in the delinquency account status defined on the `AccountBillingParameter`.
     */
    public ?AccountStatus $delinquencyRemovalAccountStatus;

    /**
     * The account type.
     */
    public ?AccountType $accountType;

    /**
     * Default billing settings that are applied to some accounts on creation.
     */
    public ?BillingDefault $billingDefault;

    /**
     * Parameters that define the billing settings for an `Account`.
     * @var \SeanKndy\SonarApi\Resources\AccountBillingParameter[]
     */
    public array $accountBillingParameters;

    /**
     * The service items and overrides for linked billing defaults.
     * @var \SeanKndy\SonarApi\Resources\BillingService[]
     */
    public array $billingServices;

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