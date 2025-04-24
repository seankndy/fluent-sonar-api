<?php

namespace SeanKndy\SonarApi\Resources;

class GenericInventoryItem extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * The type of entity that owns this generic `InventoryItem`.
     */
    public int $genericinventoryitemableId;

    /**
     * The ID of the entity that owns this generic `InventoryItem`.
     */
    public string $genericinventoryitemableType;

    /**
     * The ID of an `InventoryModel`.
     */
    public int $inventoryModelId;

    /**
     * The quantity for this service.
     */
    public int $quantity;

    /**
     * A type of item stored in inventory.
     */
    public ?InventoryModel $inventoryModel;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

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