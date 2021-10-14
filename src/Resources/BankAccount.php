<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasAddresses;
use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class BankAccount extends BaseResource
{
    use HasNotes, HasAddresses;

    public int $id;

    public int $accountId;

    public int $bankAccountProcessorId;

    public string $bankAccountType;

    public bool $auto;

    private int $customerProfileId;

    public string $maskedAccountNumber;

    public ?string $nameOnAccount;

    public ?string $routingNumber;

    public ?string $token;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?Account $account;

    public BankAccountProcessor $bankAccountProcessor;
}