<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduleBlocker extends BaseResource
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
     * Whether this repeats forever or not.
     */
    public bool $infiniteRepetitions;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The number of times this repeats.
     */
    public ?int $repetitions;

    /**
     * The start date for this `ScheduleAvailability`.
     */
    public string $startDate;

    /**
     * The number of weeks between repetitions.
     */
    public int $weeksBetweenRepetitions;

    /**
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

    /**
     * A day and time associated with a `ScheduleBlocker`.
     * @var \SeanKndy\SonarApi\Resources\ScheduleBlockerDayTime[]
     */
    public array $scheduleBlockerDayTimes;

    /**
     * An override to a particular day and time a `ScheduleBlocker` would otherwise cover.
     * @var \SeanKndy\SonarApi\Resources\ScheduleBlockerOverride[]
     */
    public array $scheduleBlockerOverrides;

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