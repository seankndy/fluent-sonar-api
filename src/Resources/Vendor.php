<?php

namespace SeanKndy\SonarApi\Resources;

class Vendor extends BaseResource implements IdentityInterface
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
     * Archived vendors may not be used for creating new Purchase Orders or Product Requests.
     */
    public bool $archived;

    /**
     * Determines if approved purchase orders for this vendor should automatically dispatch an email to the vendor.
     */
    public bool $automateApprovedPurchaseOrders;

    /**
     * The currency used for all transactions with this vendor.
     */
    public string $currency;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The terms of payment for deliveries from this vendor.
     */
    public string $paymentTerms;

    /**
     * A contact person.
     * @var \SeanKndy\SonarApi\Resources\Contact[]
     */
    public array $contacts;

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
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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
     * An item that can be purchased from a particular vendor.
     * @var \SeanKndy\SonarApi\Resources\VendorItem[]
     */
    public array $vendorItems;

    /**
     * A purchase order for items from a third party vendor.
     * @var \SeanKndy\SonarApi\Resources\PurchaseOrder[]
     */
    public array $purchaseOrders;

    /**
     * A tax.
     * @var \SeanKndy\SonarApi\Resources\Tax[]
     */
    public array $taxes;

}