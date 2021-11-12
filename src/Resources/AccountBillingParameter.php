<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AccountBillingParameter extends BaseResource implements IdentityInterface
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
     * If `invoice_day` is not null, this allows you to select whether `auto_pay_days` is calculated from the billing day, or the invoice day.
     */
    public string $autoPayDay;

    /**
     * The number of days after `auto_pay_day` that auto pay runs for an invoice.
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
     * The number of days after the invoice due date that the invoice is marked delinquent.
     */
    public int $graceDays;

    /**
     * A temporary override that stops the account becoming delinquent until this date.
     */
    public ?string $graceUntil;

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
     * A customer account.
     */
    public ?Account $account;

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