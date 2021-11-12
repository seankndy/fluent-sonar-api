<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AlertingRotationDay extends BaseResource implements IdentityInterface
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
     * The alerting rotation ID.
     */
    public int $alertingRotationId;

    /**
     * A day.
     */
    public string $day;

    /**
     * The end time for the day.
     */
    public string $endTime;

    /**
     * The start time for the day.
     */
    public string $startTime;

    /**
     * An alerting rotation.
     */
    public ?AlertingRotation $alertingRotation;

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