<?php

namespace SeanKndy\SonarApi\Resources;

class StandardizedVehicle extends BaseResource
{
    /**
     * A GPS Tracking Provider vehicle unique identifier.
     */
    public ?string $uid;

    /**
     * The vehicle identification number.
     */
    public ?string $vin;

    /**
     * The manufacturer.
     */
    public ?string $manufacturer;

    /**
     * The model.
     */
    public ?string $model;

    /**
     * A year.
     */
    public ?string $year;

    /**
     * A descriptive name.
     */
    public ?string $name;

}