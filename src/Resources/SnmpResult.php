<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpResult extends BaseResource
{
    /**
     * The value.
     */
    public string $value;

    /**
     * The time.
     */
    public \DateTime $time;

    /**
     * A Unix timestamp in the same timezone as this Sonar instance
     */
    public ?string $epochSystemTimezone;

}