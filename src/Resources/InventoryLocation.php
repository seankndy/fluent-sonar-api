<?php

namespace SeanKndy\SonarApi\Resources;

class InventoryLocation extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;
    use Traits\HasAddresses;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Marks this inventory location as the default shipping location for purchase orders.
     */
    public bool $defaultShippingLocation;

    /**
     * A geo-point.
     */
    public ?string $geopoint;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * An inventory item.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $inventoryItems;

    /**
     * A generic inventory item.
     * @var \SeanKndy\SonarApi\Resources\GenericInventoryItem[]
     */
    public array $genericInventoryItems;

    /**
     * A log of an action taken against a set of generic inventory items.
     * @var \SeanKndy\SonarApi\Resources\GenericInventoryItemActionLog[]
     */
    public array $genericInventoryItemActionLogs;

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

    /**
     * A location inside an `InventoryLocation` (e.g. a shelf or a room.)
     * @var \SeanKndy\SonarApi\Resources\InternalLocation[]
     */
    public array $internalLocations;

    /**
     * A purchase order for items from a third party vendor.
     * @var \SeanKndy\SonarApi\Resources\PurchaseOrder[]
     */
    public array $purchaseOrders;

    /**
     * Defines the minimum and maximum of an inventory level per location per inventory model.
     * @var \SeanKndy\SonarApi\Resources\InventoryModelMinMax[]
     */
    public array $inventoryModelMinMaxes;

}