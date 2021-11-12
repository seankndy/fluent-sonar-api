<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class GenericInventoryAssignee extends BaseResource implements IdentityInterface
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