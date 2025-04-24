<?php

namespace SeanKndy\SonarApi\Resources;

class StoredGroup extends BaseResource implements IdentityInterface
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
     * The ID of a `StoredView` entity.
     */
    public int $storedViewId;

    /**
     * A stored view.
     */
    public ?StoredView $storedView;

    /**
     * A filter applied in a `StoredView`.
     * @var \SeanKndy\SonarApi\Resources\StoredFilter[]
     */
    public array $storedFilters;

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