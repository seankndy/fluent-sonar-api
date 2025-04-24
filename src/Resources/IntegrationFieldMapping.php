<?php

namespace SeanKndy\SonarApi\Resources;

class IntegrationFieldMapping extends BaseResource implements IdentityInterface
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
     * The vendor specific type for field.
     */
    public string $integrationFieldType;

    /**
     * The ID of the configuration entity which owns this mapping.
     */
    public ?int $integrationconfigurableId;

    /**
     * The type of the configuration entity which owns this mapping.
     */
    public ?string $integrationconfigurableType;

    /**
     * The ID of an `InventoryModelField`.
     */
    public int $inventoryModelFieldId;

    /**
     * The ID of an `InventoryModel`.
     */
    public int $inventoryModelId;

    /**
     * A type of item stored in inventory.
     */
    public ?InventoryModel $inventoryModel;

    /**
     * A field on an inventory model.
     */
    public ?InventoryModelField $inventoryModelField;

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