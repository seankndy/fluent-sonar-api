<?php

namespace SeanKndy\SonarApi\Resources;

class GenericInventoryItemActionLog extends BaseResource implements IdentityInterface
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
     * The action that was performed.
     */
    public string $action;

    /**
     * The ID of the entity that this `GenericInventoryItemActionLog` is for.
     */
    public int $genericinventoryitemactionloggableId;

    /**
     * The type of entity that this `GenericInventoryItemActionLog` is for.
     */
    public string $genericinventoryitemactionloggableType;

    /**
     * The ID of an `InventoryModel`.
     */
    public int $inventoryModelId;

    /**
     * The purchase price of this item.
     */
    public ?float $purchasePrice;

    /**
     * The quantity for this service.
     */
    public int $quantity;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A type of item stored in inventory.
     */
    public ?InventoryModel $inventoryModel;

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