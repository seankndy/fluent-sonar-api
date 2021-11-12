<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class CustomField extends BaseResource implements IdentityInterface
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
     * The type of entity this custom field will be associated with.
     */
    public string $entityType;

    /**
     * A list of values that are valid for this field, if this is a TEXT field. If this is empty, and the field is a TEXT type, then any value will be allowed.
     * @var string[]
     */
    public ?array $enumOptions;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Whether or not this field is required.
     */
    public bool $required;

    /**
     * The type.
     */
    public string $type;

    /**
     * Whether or not the value of this custom field must be unique throughout the system.
     */
    public bool $unique;

    /**
     * Data entered into a `CustomField`.
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

    /**
     * A company you do business as.
     * @var \SeanKndy\SonarApi\Resources\Company[]
     */
    public array $companies;

    /**
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

    /**
     * A `task template item`.
     * @var \SeanKndy\SonarApi\Resources\TaskTemplateItem[]
     */
    public array $taskTemplateItems;

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