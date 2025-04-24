<?php

namespace SeanKndy\SonarApi\Resources;

class StoredView extends BaseResource implements IdentityInterface
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
     * The ID of the user that created this entity.
     */
    public ?int $createdByUserId;

    /**
     * Whether or not this StoredView is available to all users.
     */
    public bool $isGlobal;

    /**
     * The location in the UI that this view is available.
     */
    public string $location;

    /**
     * A name to identify this `StoredView`.
     */
    public string $name;

    /**
     * The column used to sort the filtered results.
     */
    public ?string $sortColumn;

    /**
     * The direction to sort in.
     */
    public ?string $sortDirection;

    /**
     * The type of `StoredView`.
     */
    public string $type;

    /**
     * The ID of the user that created this entity.
     */
    public ?User $createdByUser;

    /**
     * A group of filters in a `StoredView`.
     * @var \SeanKndy\SonarApi\Resources\StoredGroup[]
     */
    public array $storedGroups;

    /**
     * A `StoredView` associated with a `User`.
     * @var \SeanKndy\SonarApi\Resources\StoredViewUser[]
     */
    public array $storedViewUsers;

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