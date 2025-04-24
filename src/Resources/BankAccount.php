<?php

namespace SeanKndy\SonarApi\Resources;

class BankAccount extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;
    use Traits\HasAddresses;

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
     * The ID of a BankProcessor.
     */
    public int $bankAccountProcessorId;

    /**
     * The type of bank account this is.
     */
    public string $bankAccountType;

    /**
     * The profile ID provided by a credit card processing service.
     */
    public ?string $customerProfileId;

    /**
     * A partial account number that can be used for identification.
     */
    public string $maskedAccountNumber;

    /**
     * The name on the account.
     */
    public ?string $nameOnAccount;

    /**
     * The bank routing number.
     */
    public ?string $routingNumber;

    /**
     * The tokenized value that represents a credit card, provided by a credit card processing service.
     */
    public ?string $token;

    /**
     * A customer account.
     */
    public ?Account $account;

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

    /**
     * A payment.
     * @var \SeanKndy\SonarApi\Resources\Payment[]
     */
    public array $payments;

}