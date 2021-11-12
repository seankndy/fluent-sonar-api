<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class ScheduleTimeOff extends BaseResource implements IdentityInterface
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
     * The date and time that this ends.
     */
    public \DateTime $endDatetime;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The date and time that this starts.
     */
    public \DateTime $startDatetime;

    /**
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

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