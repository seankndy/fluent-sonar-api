<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class CoreTransaction extends BaseResource implements IdentityInterface
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $amount;

    /**
     * A date and time
     */
    public \DateTime $datetime;

    /**
     * A human readable description.
     */
    public ?string $description;

    /**
     * The balance in relation to prior transactions.
     */
    public int $runningBalance;

    /**
     * The balance in relation to prior transactions.
     */
    public int $runningBalanceAmount;

    /**
     * A unique value used for sorting, based on date, time, and ID.
     */
    public string $sortingDatetime;

    /**
     * Whether or not this was successful.
     */
    public ?bool $successful;

    /**
     * The total of all taxes on this transaction.
     */
    public int $taxTotal;

    /**
     * The type.
     */
    public string $type;

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