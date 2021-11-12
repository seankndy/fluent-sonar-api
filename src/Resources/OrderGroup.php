<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class OrderGroup extends BaseResource implements IdentityInterface
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
     * The threshold at which requesters require approval of their purchase orders.
     */
    public int $automaticApprovalThreshold;

    /**
     * Disabled order groups cannot be assigned users or used to create purchase orders.
     */
    public bool $enabled;

    /**
     * The name of an order group.
     */
    public string $name;

    /**
     * A purchase order for items from a third party vendor.
     * @var \SeanKndy\SonarApi\Resources\PurchaseOrder[]
     */
    public array $purchaseOrders;

    /**
     * The relationship between an order group and a user.
     * @var \SeanKndy\SonarApi\Resources\OrderGroupUser[]
     */
    public array $orderGroupUsers;

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