<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class DeploymentType extends BaseResource implements IdentityInterface
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
     * The ID of an `InventoryModel`.
     */
    public int $inventoryModelId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a `NetworkMonitoringTemplate`.
     */
    public ?int $networkMonitoringTemplateId;

    /**
     * A type of item stored in inventory.
     */
    public ?InventoryModel $inventoryModel;

    /**
     * A `NetworkMonitoringTemplate`.
     */
    public ?NetworkMonitoringTemplate $networkMonitoringTemplate;

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