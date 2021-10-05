<?php

namespace SeanKndy\SonarApi\Resources;

class AccountBillingParameter extends BaseResource
{
    public int $id;

    public int $accountId;

    public string $autoPayDay;

    public int $autoPayDays;

    public ?int $billDay;

    public string $billDayMode;

    public string $billMode;

    public ?int $daysOfDelinquencyForStatusSwitch;

    public ?int $delinquencyAccountStatusId;

    public ?int $delinquencyRemovalAccountStatusId;

    public int $dueDays;

    public string $dueDaysDay;

    public int $graceDays;

    public ?\DateTime $graceUntil;

    public ?int $invoiceDay;

    public ?int $monthsToBill;

    public bool $printInvoice;

    public bool $switchStatusAfterDelinquency;

    public bool $taxExempt;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?AccountStatus $delinquencyAccountStatus;

    public ?AccountStatus $delinquencyRemovalAccountStatus;
}