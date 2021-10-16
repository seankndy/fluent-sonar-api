<?php

namespace SeanKndy\SonarApi\Resources;

class PurchaseOrder extends BaseResource
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
     * The ID of the user that approved this purchase order.
     */
    public ?int $approvedByUserId;

    /**
     * The date/time that this purchase order was cancelled.
     */
    public ?\DateTime $canceledAt;

    /**
     * The ID of the user that cancelled this purchase order.
     */
    public ?int $canceledByUserId;

    /**
     * The ID of the company that will be used in the header of this purchase order.
     */
    public int $companyId;

    /**
     * The ID of the user that created this purchase order.
     */
    public int $createdByUserId;

    /**
     * The currency the system displays money in.
     */
    public ?string $currency;

    /**
     * A message to be included on purchase orders when sent to vendors.
     */
    public ?string $externalMessage;

    /**
     * The source of the shipping address for a purchase order.
     */
    public int $inventoryLocationId;

    /**
     * The date and time that the inventory item status last changed.
     */
    public \DateTime $lastStatusChange;

    /**
     * The ID of an order group related to this purchase order.
     */
    public ?int $orderGroupId;

    /**
     * A unique number identifying an approved purchase order.
     */
    public ?int $orderNumber;

    /**
     * The terms of payment for deliveries from this vendor.
     */
    public ?string $paymentTerms;

    /**
     * The current status of this purchase order.
     */
    public string $status;

    /**
     * The ID of the tax that should be applied to each item sold by this vendor.
     */
    public ?int $taxId;

    /**
     * The ID of a vendor.
     */
    public int $vendorId;

    /**
     * The name of a vendor.
     */
    public ?string $vendorName;

    /**
     * The ID of the user that canceled this purchase order.
     */
    public ?User $canceledByUser;

    /**
     * The ID of the user that created this entity.
     */
    public ?User $createdByUser;

    /**
     * The ID of the user that approved this purchase order.
     */
    public ?User $approvedByUser;

    /**
     * A third party vendor of inventory models.
     */
    public ?Vendor $vendor;

    /**
     * A location that inventory is stored in.
     */
    public ?InventoryLocation $inventoryLocation;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * An order group.
     */
    public ?OrderGroup $orderGroup;

    /**
     * A tax.
     */
    public ?Tax $tax;

    /**
     * A line item on a purchase order.
     * @var \SeanKndy\SonarApi\Resources\PurchaseOrderItem[]
     */
    public array $purchaseOrderItems;

    /**
     * An email.
     * @var \SeanKndy\SonarApi\Resources\Email[]
     */
    public array $emails;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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