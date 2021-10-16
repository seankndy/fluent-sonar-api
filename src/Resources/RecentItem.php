<?php

namespace SeanKndy\SonarApi\Resources;

class RecentItem extends BaseResource
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
     * The ID of the entity that this recent item entry is for.
     */
    public int $recentitemableId;

    /**
     * The entity that a recent item entry is for.
     */
    public string $recentitemableType;

    /**
     * The ID of a User.
     */
    public int $userId;

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