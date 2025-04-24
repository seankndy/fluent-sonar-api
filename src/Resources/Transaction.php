<?php

namespace SeanKndy\SonarApi\Resources;

class Transaction extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * The type.
     */
    public int $amount;

    /**
     * A description for the transaction.
     */
    public ?string $description;

    /**
     * The date and time of the transaction.
     */
    public ?\DateTime $datetime;

    /**
     * The balance in relation to prior transactions.
     */
    public int $runningBalance;

    /**
     * The type of transaction this is.
     */
    public string $type;

    /**
     * The total of all taxes on this transaction.
     */
    public int $taxTotal;

    /**
     * A debit.
     */
    public ?Debit $debit;

    /**
     * A discount.
     */
    public ?Discount $discount;

    /**
     * A payment.
     */
    public ?Payment $payment;

    /**
     * A customer account.
     */
    public Account $account;

    /**
     * Whether or not this was successful.
     */
    public ?bool $successful;

}