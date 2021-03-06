<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class InventoryModelFieldData extends BaseResource implements IdentityInterface
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
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * The ID of an `InventoryModelField`.
     */
    public int $inventoryModelFieldId;

    /**
     * The value.
     */
    public string $value;

    /**
     * A field on an inventory model.
     */
    public ?InventoryModelField $inventoryModelField;

    /**
     * An inventory item.
     */
    public ?InventoryItem $inventoryItem;

    /**
     * An IP address assignment.
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

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