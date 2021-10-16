<?php

namespace SeanKndy\SonarApi\Resources;

class DailyAggregateValue extends BaseResource
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
     * Additional context regarding the item.
     */
    public ?string $context;

    /**
     * A date
     */
    public string $date;

    /**
     * Key for a specific value.
     */
    public string $key;

    /**
     * The value.
     */
    public float $value;

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