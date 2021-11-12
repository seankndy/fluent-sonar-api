<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class TaskTemplateItem extends BaseResource implements IdentityInterface
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
     * The ID of the entity that completes or completed this task.
     */
    public ?int $completableId;

    /**
     * The type of entity that completes this task.
     */
    public ?string $completableType;

    /**
     * How this task gets marked as completed.
     */
    public string $completionType;

    /**
     * The order this item is shown in a list.
     */
    public ?int $listOrder;

    /**
     * The task to be performed.
     */
    public string $task;

    /**
     * The ID of a `TaskTemplate`.
     */
    public int $taskTemplateId;

    /**
     * A `task template`.
     */
    public ?TaskTemplate $taskTemplate;

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