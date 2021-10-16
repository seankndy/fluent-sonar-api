<?php

namespace SeanKndy\SonarApi\Resources;

class IcmpStatusResult extends BaseResource
{
    /**
     * The time.
     */
    public ?\DateTime $time;

    /**
     * The status.
     */
    public ?string $status;

    /**
     * The reason.
     */
    public ?string $reason;

    /**
     * A Unix timestamp in the same timezone as this Sonar instance
     */
    public ?string $epochSystemTimezone;

}