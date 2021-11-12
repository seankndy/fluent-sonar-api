<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class ScheduleAvailabilityDayTime extends BaseResource implements IdentityInterface
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
     * Whether this day is available from start to finish.
     */
    public bool $allDay;

    /**
     * A day.
     */
    public string $day;

    /**
     * The end time for the day.
     */
    public ?string $endTime;

    /**
     * The ID of a `ScheduleAvailability`.
     */
    public int $scheduleAvailabilityId;

    /**
     * The start time for the day.
     */
    public ?string $startTime;

    /**
     * Availability for `Job`s to be scheduled.
     */
    public ?ScheduleAvailability $scheduleAvailability;

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