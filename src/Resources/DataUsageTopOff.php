<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class DataUsageTopOff extends BaseResource implements IdentityInterface
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
     * The amount of top off data in bytes.
     */
    public int $amountInBytes;

    /**
     * The ID of a `DataUsageHistory`.
     */
    public int $dataUsageHistoryId;

    /**
     * The ID of a `Debit`.
     */
    public ?int $debitId;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A debit.
     */
    public ?Debit $debit;

    /**
     * A data usage history entry.
     */
    public ?DataUsageHistory $dataUsageHistory;

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