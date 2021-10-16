<?php

namespace SeanKndy\SonarApi\Resources;

class IcmpResult extends BaseResource
{
    /**
     * The time.
     */
    public ?\DateTime $time;

    /**
     * The high latency.
     */
    public ?float $high;

    /**
     * The low latency.
     */
    public ?float $low;

    /**
     * The median latency.
     */
    public ?float $median;

    /**
     * The loss percentage.
     */
    public ?float $loss;

    /**
     * A Unix timestamp in the same timezone as this Sonar instance
     */
    public ?string $epochSystemTimezone;

}