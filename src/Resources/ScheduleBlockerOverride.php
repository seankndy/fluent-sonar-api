<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class ScheduleBlockerOverride extends BaseResource implements IdentityInterface
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
     * The ID of a `ScheduleBlocker`.
     */
    public int $scheduleBlockerId;

    /**
     * The date and time that this starts.
     */
    public \DateTime $startDatetime;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * An event that blocks off part of a calendar otherwise availability due to `ScheduleAvailability`.
     */
    public ?ScheduleBlocker $scheduleBlocker;

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