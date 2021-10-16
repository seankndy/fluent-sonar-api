<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpInterfaceNumericResult extends BaseResource
{
    /**
     * The time.
     */
    public ?\DateTime $time;

    /**
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * The metric being tracked (e.g. packets per second inbound, errors outbound.)
     */
    public ?string $type;

    /**
     * The interface.
     */
    public ?string $interface;

    /**
     * The value.
     */
    public ?float $value;

    /**
     * A Unix timestamp in the same timezone as this Sonar instance
     */
    public ?string $epochSystemTimezone;

}