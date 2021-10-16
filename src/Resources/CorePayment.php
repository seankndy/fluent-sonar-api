<?php

namespace SeanKndy\SonarApi\Resources;

class CorePayment extends BaseResource
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The amount of the payment, in the smallest currency value.
     */
    public int $amount;

    /**
     * The amount remaining that can be used.
     */
    public int $amountRemaining;

    /**
     * The ID of a BankAccount.
     */
    public ?int $bankAccountId;

    /**
     * The ID of the company that this entity operates under.
     */
    public int $companyId;

    /**
     * The ID of a CreditCard.
     */
    public ?int $creditCardId;

    /**
     * The deposit slip ID.
     */
    public ?int $depositSlipId;

    /**
     * A description of the payment, used for internal reference.
     */
    public ?string $description;

    /**
     * The entire response back from the company that processed the transaction. Not typically human readable.
     */
    public ?string $fullProcessorResponse;

    /**
     * The date and time the payment was made.
     */
    public \DateTime $paymentDatetime;

    /**
     * The unique tracking ID for this payment.
     */
    public ?string $paymentTrackerId;

    /**
     * The type of payment (e.g. cash, credit card.)
     */
    public string $paymentType;

    /**
     * The message returned back from the company that processed the transaction.
     */
    public ?string $processorMessage;

    /**
     * A payment reference like a check number, or wire transfer confirmation number.
     */
    public ?string $reference;

    /**
     * Whether or not this was successful.
     */
    public bool $successful;

    /**
     * The transaction ID from the credit card provider.
     */
    public ?string $transactionId;

    /**
     * The ID of a User.
     */
    public ?int $userId;

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