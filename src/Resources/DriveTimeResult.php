<?php

namespace SeanKndy\SonarApi\Resources;

class DriveTimeResult extends BaseResource
{
    /**
     * The starting latitude.
     */
    public string $startLatitude;

    /**
     * The starting longitude.
     */
    public string $startLongitude;

    /**
     * The ending latitude.
     */
    public string $endLatitude;

    /**
     * The ending longitude.
     */
    public string $endLongitude;

    /**
     * The amount of time it takes to drive from the start to the end, in minutes.
     */
    public ?int $driveTimeInMinutes;

    /**
     * Whether the drive time lookup succeeded.
     */
    public bool $success;

    /**
     * If the drive time lookup failed, the error that was provided.
     */
    public ?string $error;

}