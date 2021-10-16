<?php

namespace SeanKndy\SonarApi\Resources;

class DataUsage extends BaseResource
{
    /**
     * The time.
     */
    public ?\DateTime $time;

    /**
     * The amount of inbound bytes per second.
     */
    public ?int $inbytesPerSecond;

    /**
     * The amount of outbound bytes per second.
     */
    public ?int $outbytesPerSecond;

    /**
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The data source identifier.
     */
    public ?string $dataSourceIdentifier;

    /**
     * The data source parent.
     */
    public ?string $dataSourceParent;

    /**
     * A Unix timestamp in the same timezone as this Sonar instance
     */
    public ?string $epochSystemTimezone;

}