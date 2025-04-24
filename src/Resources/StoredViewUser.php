<?php

namespace SeanKndy\SonarApi\Resources;

class StoredViewUser extends BaseResource implements IdentityInterface
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
     * The location in the UI that this view is available.
     */
    public string $location;

    /**
     * The ID of a `StoredView` entity.
     */
    public int $storedViewId;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A stored view.
     */
    public ?StoredView $storedView;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

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