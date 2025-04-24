<?php

namespace SeanKndy\SonarApi\Resources;

class StoredFilter extends BaseResource implements IdentityInterface
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
     * The field that is being filtered.
     */
    public string $field;

    /**
     * The operator being applied.
     */
    public string $operator;

    /**
     * The order in which the filter is applied.
     */
    public ?int $order;

    /**
     * The ID of a StoredGroup entity.
     */
    public int $storedGroupId;

    /**
     * The value being filtered against.
     */
    public ?string $value;

    /**
     * A group of filters in a `StoredView`.
     */
    public ?StoredGroup $storedGroup;

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