<?php

namespace SeanKndy\SonarApi\Resources;

class VendorItem extends BaseResource
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
     * Archived vendor items may not be used for creating new purchase orders or product requests.
     */
    public bool $archived;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Part number used by the vendor to identify this vendor item.
     */
    public ?string $partNumber;

    /**
     * The purchase price of this item from the vendor.
     */
    public int $price;

    /**
     * Number of inventory models that are included in a single unit of this vendors product.
     */
    public int $quantityPerUnit;

    /**
     * Flag for vendor items that should create a one-time service for retail sale to customers.
     */
    public bool $retailItem;

    /**
     * The price of the one-time service created for this vendor item
     */
    public ?int $retailItemPrice;

    /**
     * The ID of the one-time service created when this vendor item was created.
     */
    public ?int $retailItemServiceId;

    /**
     * The ID of the vendor that sells this item
     */
    public int $vendorId;

    /**
     * The ID of the entity that is referred to by this vendor item.
     */
    public ?int $vendoritemableId;

    /**
     * The type of entity that is referred to by this vendor item.
     */
    public ?string $vendoritemableType;

    /**
     * A third party vendor of inventory models.
     */
    public ?Vendor $vendor;

    /**
     * A one-time service associated with a vendor item.
     */
    public ?Service $retailItemService;

    /**
     * The relationship between an `Account` and a `Service`.
     */
    public ?AccountService $accountService;

    /**
     * The relationship between a `Package` and a `Service`.
     */
    public ?PackageService $packageService;

    /**
     * A line item on a purchase order.
     * @var \SeanKndy\SonarApi\Resources\PurchaseOrderItem[]
     */
    public array $purchaseOrderItems;

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