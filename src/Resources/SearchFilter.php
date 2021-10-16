<?php

namespace SeanKndy\SonarApi\Resources;

class SearchFilter extends BaseResource
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
     * Whether the filter is available to every user (admins only).
     */
    public bool $allUsers;

    /**
     * The type of entity this filter belongs to.
     */
    public string $entityType;

    /**
     * The actual filter, as JSON.
     */
    public string $filter;

    /**
     * The filter's name.
     */
    public string $name;

    /**
     * The ID of the user that created this entity.
     */
    public int $userId;

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