<?php

namespace SeanKndy\SonarApi\Resources;

class Invoice extends BaseResource
{
    public int $id;

    public int $accountId;

    public int $companyId;

    public ?int $parentInvoiceId;

    public int $remainingDue;

    public int $totalDebits;

    public int $totalTaxes;

    public ?int $autoPayAttempts;

    public \DateTime $autoPayDate;

    public \DateTime $date;

    public \DateTime $dueDate;

    public \DateTime $endDate;

    public ?\DateTime $delinquencyDate;

    public ?\DateTime $voidedAt;

    public int $childInvoiceRemainingDue;

    public bool $delinquent;

    public bool $frozen;

    public bool $void;

    public bool $lateFeeApplied;

    public bool $lateFeeOnly;

    public ?string $message;

    public int $numberOfMonths;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?Account $account;

    public ?Company $company;
}