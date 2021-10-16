<?php

namespace SeanKndy\SonarApi\Resources;

class InventoryModelField extends BaseResource
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
     * The ID of an `InventoryModel`.
     */
    public int $inventoryModelId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A single inventory model field can be set to be the primary field. This will be used as the primary identifier for items of this model throughout Sonar.
     */
    public bool $primary;

    /**
     * A PCRE regular expression. Omit the leading and closing /.
     */
    public ?string $regexp;

    /**
     * Whether or not this field is required.
     */
    public bool $required;

    /**
     * Secondary types that inventory model fields can be set to.
     */
    public ?string $secondaryType;

    /**
     * Types that inventory model fields can be set to.
     */
    public string $type;

    /**
     * Whether or not the field contents must be unique.
     */
    public string $unique;

    /**
     * A type of item stored in inventory.
     */
    public ?InventoryModel $inventoryModel;

    /**
     * Data contained within an inventory item field.
     * @var \SeanKndy\SonarApi\Resources\InventoryModelFieldData[]
     */
    public array $inventoryModelFieldData;

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