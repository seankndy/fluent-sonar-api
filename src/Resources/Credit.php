<?php

namespace SeanKndy\SonarApi\Resources;

class Credit extends BaseResource
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
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $amount;

    /**
     * The ID the transaction that created this credit.
     */
    public int $creditableId;

    /**
     * The type of transaction that created this credit.
     */
    public string $creditableType;

    /**
     * The ID of an `Invoice`.
     */
    public int $invoiceId;

    /**
     * Whether or not this entity has been voided.
     */
    public bool $void;

    /**
     * When this was voided.
     */
    public ?\DateTime $voidedAt;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * An invoice.
     */
    public ?Invoice $invoice;

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