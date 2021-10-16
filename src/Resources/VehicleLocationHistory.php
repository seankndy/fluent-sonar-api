<?php

namespace SeanKndy\SonarApi\Resources;

class VehicleLocationHistory extends BaseResource
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
     * A decimal latitude.
     */
    public string $latitude;

    /**
     * A decimal longitude.
     */
    public string $longitude;

    /**
     * The ID of a `Vehicle`.
     */
    public int $vehicleId;

    /**
     * A vehicle.
     */
    public ?Vehicle $vehicle;

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