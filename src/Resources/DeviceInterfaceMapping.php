<?php

namespace SeanKndy\SonarApi\Resources;

class DeviceInterfaceMapping extends BaseResource
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
     * A human readable description.
     */
    public string $description;

    /**
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * A MAC address.
     */
    public ?string $macAddress;

    /**
     * The metadata.
     */
    public string $metadata;

    /**
     * The interface in speed in Mbps.
     */
    public ?int $speedMbpsIn;

    /**
     * The interface out speed in Mbps.
     */
    public ?int $speedMbpsOut;

    /**
     * The type.
     */
    public ?string $type;

    /**
     * Whether or not this interface is up.
     */
    public bool $up;

    /**
     * An inventory item.
     */
    public ?InventoryItem $inventoryItem;

    /**
     * The interfaces connected to this interface.
     * @var \SeanKndy\SonarApi\Resources\DeviceInterfaceMapping[]
     */
    public array $connectedInterfaces;

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