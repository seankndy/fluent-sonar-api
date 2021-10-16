<?php

namespace SeanKndy\SonarApi\Resources;

class DataUsageHistory extends BaseResource
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
     * The total billable inbound data in bytes.
     */
    public int $billableInBytes;

    /**
     * The total billable outbound data in bytes.
     */
    public int $billableOutBytes;

    /**
     * The end time of this data usage history interval.
     */
    public ?\DateTime $endTime;

    /**
     * The total free inbound data in bytes.
     */
    public int $freeInBytes;

    /**
     * The total free outbound data in bytes.
     */
    public int $freeOutBytes;

    /**
     * The policy cap when this data usage history interval was closed.
     */
    public int $policyCapAtCloseInBytes;

    /**
     * The total available rollover data in bytes.
     */
    public int $rolloverAvailableInBytes;

    /**
     * The total remaining rollover data in bytes.
     */
    public int $rolloverRemainderBytes;

    /**
     * The total unconsumed rollover data in bytes.
     */
    public int $rolloverUnconsumedBytes;

    /**
     * The rollover used when this data usage history interval was closed.
     */
    public int $rolloverUsedAtCloseInBytes;

    /**
     * The start time of this data usage history interval.
     */
    public \DateTime $startTime;

    /**
     * The top off total when this data usage history interval was closed.
     */
    public int $topOffTotalAtCloseInBytes;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A data usage top off.
     * @var \SeanKndy\SonarApi\Resources\DataUsageTopOff[]
     */
    public array $dataUsageTopOffs;

    /**
     * The `DataUsageHistory`(s) that were rolled over.
     * @var \SeanKndy\SonarApi\Resources\DataUsageHistory[]
     */
    public array $availableRolloverHistories;

    /**
     * The parent `DataUsageHistory`(s) for which this `DataUsageHistory` is counted as a rollover for.
     * @var \SeanKndy\SonarApi\Resources\DataUsageHistory[]
     */
    public array $rolloverParentHistories;

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