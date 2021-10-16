<?php

namespace SeanKndy\SonarApi\Resources;

class TaskTemplate extends BaseResource
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
     * A descriptive name.
     */
    public string $name;

    /**
     * A `task template item`.
     * @var \SeanKndy\SonarApi\Resources\TaskTemplateItem[]
     */
    public array $taskTemplateItems;

    /**
     * The type of a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobType[]
     */
    public array $jobTypes;

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