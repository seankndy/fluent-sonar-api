<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class CreditCardProcessorCredential extends BaseResource implements IdentityInterface
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
     * The credential name.
     */
    public string $credential;

    /**
     * The ID of a CreditCardProcessor.
     */
    public int $creditCardProcessorId;

    /**
     * The value.
     */
    public string $value;

    /**
     * A company that processes `CreditCard` transactions.
     */
    public ?CreditCardProcessor $creditCardProcessor;

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