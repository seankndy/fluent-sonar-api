<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class BankAccountProcessor extends BaseResource
{
    use HasNotes;
    
    public int $id;

    public bool $enabled;

    public bool $primary;

    public string $provider;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    /**
     * @var \SeanKndy\SonarApi\Resources\BankAccount[]
     */
    public array $bankAccounts;
}