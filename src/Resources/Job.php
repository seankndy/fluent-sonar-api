<?php

namespace SeanKndy\SonarApi\Resources;

class Job extends BaseResource implements IdentityInterface
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
     * The serviceable address where this job was completed.
     */
    public ?string $addressOnCompletion;

    /**
     * Whether or not this is complete.
     */
    public bool $complete;

    /**
     * The `User` that completed this.
     */
    public ?int $completedByUserId;

    /**
     * Whether this `Job` was completed successfully or not.
     */
    public ?bool $completedSuccessfully;

    /**
     * The date and time this `Job` was completed.
     */
    public ?\DateTime $completionDatetime;

    /**
     * Any notes entered when this `Job` was completed.
     */
    public ?string $completionNotes;

    /**
     * The ID of a `JobType`.
     */
    public int $jobTypeId;

    /**
     * The ID of the entity that this `Job` is associated with.
     */
    public int $jobbableId;

    /**
     * The type of entity that this `Job` is associated with.
     */
    public string $jobbableType;

    /**
     * The length in minutes for this `Job`.
     */
    public int $lengthInMinutes;

    /**
     * The date and time this `Job` is scheduled for.
     */
    public ?\DateTime $scheduledDatetime;

    /**
     * The ID of the serviceable address account assignment future.
     */
    public ?int $serviceableAddressAccountAssignmentFutureId;

    /**
     * Indicates this entity has skipped the validations which would normally apply.
     */
    public bool $skipsValidation;

    /**
     * The ID of a `Ticket`.
     */
    public ?int $ticketId;

    /**
     * The type of a `Job`.
     */
    public ?JobType $jobType;

    /**
     * A ticket.
     */
    public ?Ticket $ticket;

    /**
     * The user that completed this `Job`.
     */
    public ?User $completedByUser;

    /**
     * An expected change of serviceable address account assignment.
     */
    public ?ServiceableAddressAccountAssignmentFuture $serviceableAddressAccountAssignmentFuture;

    /**
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

    /**
     * The record of a check in to a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobCheckIn[]
     */
    public array $jobCheckIns;

    /**
     * A `Service` associated with a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobService[]
     */
    public array $jobServices;

    /**
     * Data entered into a `CustomField`.
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

    /**
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

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