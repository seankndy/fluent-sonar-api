<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class BankAccountProcessorCredential extends BaseResource
{
    use HasNotes;
    
    public int $id;

    public int $bankAccountProcessorId;

    public string $credential;

    public string $value;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public BankAccountProcessor $bankAccountProcessor;
}