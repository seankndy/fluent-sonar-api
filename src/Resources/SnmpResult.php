<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpResult extends BaseResource
{
    /**
     * The value.
     */
    public string $value;

    /**
     * The minimum value found in the period
     */
    public ?int $minValue;

    /**
     * The maximum value found in the period
     */
    public ?int $maxValue;

    /**
     * The average value found in the period
     */
    public ?int $avgValue;

    /**
     * The number of datapoints found in the period
     */
    public ?int $countValue;

    /**
     * The time.
     */
    public \DateTime $time;

    /**
     * A Unix timestamp in the same timezone as this Sonar instance
     */
    public ?string $epochSystemTimezone;

}