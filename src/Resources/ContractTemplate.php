<?php

namespace SeanKndy\SonarApi\Resources;

class ContractTemplate extends BaseResource
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
     * The body.
     */
    public string $body;

    /**
     * The ID of the company that this entity operates under.
     */
    public ?int $companyId;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The term in months.
     */
    public ?int $termInMonths;

    /**
     * The ID of a `TicketGroup`.
     */
    public ?int $ticketGroupId;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * A ticket group.
     */
    public ?TicketGroup $ticketGroup;

    /**
     * A contract.
     * @var \SeanKndy\SonarApi\Resources\Contract[]
     */
    public array $contracts;

    /**
     * The type of a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobType[]
     */
    public array $jobTypes;

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