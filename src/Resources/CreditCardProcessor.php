<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class CreditCardProcessor extends BaseResource implements IdentityInterface
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
     * American Express.
     */
    public bool $amex;

    /**
     * Dankort.
     */
    public bool $dankort;

    /**
     * Diner's Club.
     */
    public bool $dinersclub;

    /**
     * Discover.
     */
    public bool $discover;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Forbrugsforeningen.
     */
    public bool $forbrugsforeningen;

    /**
     * JCB
     */
    public bool $jcb;

    /**
     * Maestro.
     */
    public bool $maestro;

    /**
     * MasterCard.
     */
    public bool $mastercard;

    /**
     * Whether or not this is the primary type of entity.
     */
    public bool $primary;

    /**
     * The company that provides credit card processing services.
     */
    public string $provider;

    /**
     * Union Pay.
     */
    public bool $unionpay;

    /**
     * Visa
     */
    public bool $visa;

    /**
     * VISA Electron.
     */
    public bool $visaelectron;

    /**
     * Credentials for a `CreditCardProcessor`.
     * @var \SeanKndy\SonarApi\Resources\CreditCardProcessorCredential[]
     */
    public array $creditCardProcessorCredentials;

    /**
     * A credit card.
     * @var \SeanKndy\SonarApi\Resources\CreditCard[]
     */
    public array $creditCards;

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