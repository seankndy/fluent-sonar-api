<?php

namespace SeanKndy\SonarApi\Resources;

class Geofence extends BaseResource
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
     * A descriptive name.
     */
    public string $name;

    /**
     * A list of polygons.
     * @var \SeanKndy\SonarApi\Resources\Polygon[]
     */
    public array $polygons;

    /**
     * Availability for `Job`s to be scheduled.
     * @var \SeanKndy\SonarApi\Resources\ScheduleAvailability[]
     */
    public array $scheduleAvailabilities;

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