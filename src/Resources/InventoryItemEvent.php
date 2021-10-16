<?php

namespace SeanKndy\SonarApi\Resources;

class InventoryItemEvent extends BaseResource
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
     * Current data.
     */
    public string $current;

    /**
     * An event.
     */
    public string $event;

    /**
     * The date and time of an event sent from Mandrill
     */
    public \DateTime $eventDatetime;

    /**
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * Previous data.
     */
    public ?string $previous;

    /**
     * An inventory item.
     */
    public ?InventoryItem $inventoryItem;

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