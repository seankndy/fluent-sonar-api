<?php

namespace SeanKndy\SonarApi\Resources;

class PurchaseOrderItem extends BaseResource implements IdentityInterface
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
     * The tax transaction that was created for this purchase order item the last time it was modified.
     */
    public ?int $calculatedTax;

    /**
     * The quantity of a generic purchase order item that has already been received.
     */
    public int $genericQuantityReceived;

    /**
     * The order this item is shown in a list.
     */
    public ?int $listOrder;

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
     * The quantity of a vendor item on a purchase order.
     */
    public int $units;

    /**
     * The ID of a vendor item.
     */
    public int $vendorItemId;

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
     * A tax.
     * @var \SeanKndy\SonarApi\Resources\Tax[]
     */
    public array $taxes;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * Data entered into a `CustomField`.
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

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