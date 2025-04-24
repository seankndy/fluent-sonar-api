<?php

namespace SeanKndy\SonarApi\Resources;

class VehicleLocationHistory extends BaseResource implements IdentityInterface
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
     * A decimal latitude.
     */
    public string $latitude;

    /**
     * A decimal longitude.
     */
    public string $longitude;

    /**
     * Odometer without unit of measure.
     */
    public ?int $odometer;

    /**
     * Unit of measure for odometer.
     */
    public ?string $odometerUm;

    /**
     * Speed without unit of measure.
     */
    public ?int $speed;

    /**
     * Unit of measure for speed.
     */
    public ?string $speedUm;

    /**
     * The status.
     */
    public ?string $status;

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