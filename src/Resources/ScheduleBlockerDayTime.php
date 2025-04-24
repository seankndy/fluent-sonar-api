<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduleBlockerDayTime extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * A day.
     */
    public string $day;

    /**
     * The end time for the day.
     */
    public string $endTime;

    /**
     * The ID of a `ScheduleBlocker`.
     */
    public int $scheduleBlockerId;

    /**
     * The start time for the day.
     */
    public string $startTime;

    /**
     * An event that blocks off part of a calendar otherwise availability due to `ScheduleAvailability`.
     */
    public ?ScheduleBlocker $scheduleBlocker;

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