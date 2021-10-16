<?php

namespace SeanKndy\SonarApi\Resources;

class BankAccountProcessor extends BaseResource
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Whether or not this is the primary type of entity.
     */
    public bool $primary;

    /**
     * The provider for this processor.
     */
    public string $provider;

    /**
     * A bank account.
     * @var \SeanKndy\SonarApi\Resources\BankAccount[]
     */
    public array $bankAccounts;

    /**
     * A credential used when processing bank account payments.
     * @var \SeanKndy\SonarApi\Resources\BankAccountProcessorCredential[]
     */
    public array $bankAccountProcessorCredentials;

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