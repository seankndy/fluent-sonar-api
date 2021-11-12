<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class CustomFieldData extends BaseResource implements IdentityInterface
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
     * The ID of a CustomField that is associated with this type of entity.
     */
    public int $customFieldId;

    /**
     * The ID of the entity that owns this custom field data.
     */
    public int $customfielddataableId;

    /**
     * The type of entity that owns this custom field data.
     */
    public string $customfielddataableType;

    /**
     * The value.
     */
    public string $value;

    /**
     * A user defined field.
     */
    public ?CustomField $customField;

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