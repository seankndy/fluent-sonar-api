<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasAddresses;

class CreditCard extends BaseResource
{
    use HasAddresses;

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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * Whether or not this payment method is enabled for automatic payments.
     */
    public bool $auto;

    /**
     * The ID of a CreditCardProcessor.
     */
    public int $creditCardProcessorId;

    /**
     * The type of a credit card (e.g. Visa, Mastercard.)
     */
    public string $creditCardType;

    /**
     * The profile ID provided by a credit card processing service.
     */
    public ?string $customerProfileId;

    /**
     * The month the credit card expires.
     */
    public int $expirationMonth;

    /**
     * The year the credit card expires.
     */
    public int $expirationYear;

    /**
     * A partial credit card number that can be used for identification.
     */
    public string $maskedNumber;

    /**
     * The name on the credit card.
     */
    public ?string $nameOnCard;

    /**
     * The tokenized value that represents a credit card, provided by a credit card processing service.
     */
    public string $token;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A company that processes `CreditCard` transactions.
     */
    public ?CreditCardProcessor $creditCardProcessor;

    /**
     * A geographical address.
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $addresses;

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

    /**
     * A payment.
     * @var \SeanKndy\SonarApi\Resources\Payment[]
     */
    public array $payments;

}
