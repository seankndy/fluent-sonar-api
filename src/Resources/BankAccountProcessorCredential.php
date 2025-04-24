<?php

namespace SeanKndy\SonarApi\Resources;

class BankAccountProcessorCredential extends BaseResource implements IdentityInterface
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
     * The ID of a BankProcessor.
     */
    public int $bankAccountProcessorId;

    /**
     * The credential name.
     */
    public string $credential;

    /**
     * The value.
     */
    public string $value;

    /**
     * A processor or method of processing bank account payments.
     */
    public ?BankAccountProcessor $bankAccountProcessor;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

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