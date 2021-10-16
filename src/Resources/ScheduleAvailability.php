<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduleAvailability extends BaseResource
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
     * Whether this `ScheduleAvailability` creates available time, or blocks available time.
     */
    public bool $available;

    /**
     * The ID of a `Geofence`.
     */
    public ?int $geofenceId;

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
     * A geographical restriction.
     */
    public ?Geofence $geofence;

    /**
     * The type of a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobType[]
     */
    public array $jobTypes;

    /**
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

    /**
     * A day and time associated with a `ScheduleAvailability`.
     * @var \SeanKndy\SonarApi\Resources\ScheduleAvailabilityDayTime[]
     */
    public array $scheduleAvailabilityDayTimes;

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