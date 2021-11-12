<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class PurchaseOrderItem extends BaseResource implements IdentityInterface
{
    use HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * The tax transaction that was created for this purchase order item the last time it was modified.
     */
    public ?int $calculatedTax;

    /**
     * The quantity of a generic purchase order item that has already been received.
     */
    public int $genericQuantityReceived;

    /**
     * A descriptive name.
     */
    public ?string $name;

    /**
     * Part number used by the vendor to identify this vendor item.
     */
    public ?string $partNumber;

    /**
     * The price of the vendor item at the time the purchase order was created.
     */
    public int $price;

    /**
     * The ID of a purchase order.
     */
    public int $purchaseOrderId;

    /**
     * Number of inventory models that are included in a single unit of this vendors product.
     */
    public ?int $quantityPerUnit;

    /**
     * The current status of a purchase order item.
     */
    public string $status;

    /**
     * The ID of a tax that should be applied to this purchase order item, overriding the vendor`s default tax.
     */
    public ?int $taxId;

    /**
     * The quantity of a vendor item on a purchase order.
     */
    public int $units;

    /**
     * The ID of a vendor item.
     */
    public int $vendorItemId;

    /**
     * A tax.
     */
    public ?Tax $tax;

    /**
     * A purchase order for items from a third party vendor.
     */
    public ?PurchaseOrder $purchaseOrder;

    /**
     * An item that can be purchased from a particular vendor.
     */
    public ?VendorItem $vendorItem;

    /**
     * An inventory item.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $inventoryItems;

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