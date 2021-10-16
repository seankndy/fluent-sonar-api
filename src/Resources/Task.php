<?php

namespace SeanKndy\SonarApi\Resources;

class Task extends BaseResource
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
     * The ID of the entity that completes or completed this task.
     */
    public ?int $completableId;

    /**
     * The type of entity that completes this task.
     */
    public ?string $completableType;

    /**
     * Whether or not this is complete.
     */
    public bool $complete;

    /**
     * The date and time this was completed.
     */
    public ?\DateTime $completedAt;

    /**
     * The `User` that completed this.
     */
    public ?int $completedByUserId;

    /**
     * How this task gets marked as completed.
     */
    public string $completionType;

    /**
     * The date on which the task is due.
     */
    public ?string $due;

    /**
     * The order this item is shown in a list.
     */
    public ?int $listOrder;

    /**
     * The task to be performed.
     */
    public string $task;

    /**
     * The ID of the entity that the task is associated with.
     */
    public int $taskableId;

    /**
     * The entity that the task is associated with.
     */
    public string $taskableType;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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