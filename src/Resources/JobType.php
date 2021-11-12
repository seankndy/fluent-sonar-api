<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class JobType extends BaseResource implements IdentityInterface
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
     * If this is set, any `Job` using this `JobType` that is completed successfully while associated with an `Account` will change the `Account` to this `AccountStatus`.
     */
    public ?int $accountStatusIdCompletion;

    /**
     * If this is set, any `Job` using this `JobType` that is completed unsuccessfully while associated with an `Account` will change the `Account` to this `AccountStatus`.
     */
    public ?int $accountStatusIdFailure;

    /**
     * Whether or not this `JobType` is valid for all `Companies`.
     */
    public bool $allCompanies;

    /**
     * Whether `Job`s associated with this `JobType` should be able to be completed with incomplete tasks.
     */
    public bool $allowCompletionWithIncompleteTasks;

    /**
     * Color.
     */
    public string $color;

    /**
     * The ID of a `ContractTemplate`.
     */
    public ?int $contractTemplateId;

    /**
     * The default length for a `Job` created using this `JobType`.
     */
    public int $defaultLengthInMinutes;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * An icon.
     */
    public string $icon;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a `TaskTemplate`.
     */
    public ?int $taskTemplateId;

    /**
     * If this is set, any `Job` using this `JobType` that is completed successfully will create a `Ticket` and assign it to this `TicketGroup`.
     */
    public ?int $ticketGroupIdCompletion;

    /**
     * If this is set, any `Job` using this `JobType` that is completed unsuccessfully will create a `Ticket` and assign it to this `TicketGroup`.
     */
    public ?int $ticketGroupIdFailure;

    /**
     * A service.
     * @var \SeanKndy\SonarApi\Resources\Service[]
     */
    public array $services;

    /**
     * A company you do business as.
     * @var \SeanKndy\SonarApi\Resources\Company[]
     */
    public array $companies;

    /**
     * Availability for `Job`s to be scheduled.
     * @var \SeanKndy\SonarApi\Resources\ScheduleAvailability[]
     */
    public array $scheduleAvailabilities;

    /**
     * The status that an `Account` will be changed to upon successful completion.
     */
    public ?AccountStatus $accountStatusCompletion;

    /**
     * The status that an `Account` will be changed to upon unsuccessful completion.
     */
    public ?AccountStatus $accountStatusFailure;

    /**
     * The `TicketGroup` for a `Ticket` created upon successful completion.
     */
    public ?TicketGroup $ticketGroupCompletion;

    /**
     * The `TicketGroup` for a `Ticket` created upon unsuccessful completion.
     */
    public ?TicketGroup $ticketGroupFailure;

    /**
     * A contract template.
     */
    public ?ContractTemplate $contractTemplate;

    /**
     * A `task template`.
     */
    public ?TaskTemplate $taskTemplate;

    /**
     * A job, typically in the field.
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

    /**
     * An `Email` that is sent when a particular event occurs.
     * @var \SeanKndy\SonarApi\Resources\TriggeredEmail[]
     */
    public array $triggeredEmails;

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