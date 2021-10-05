<?php

namespace SeanKndy\SonarApi\Resources;

class Job extends BaseResource
{
    public int $id;

    public bool $complete;

    public ?int $completedByUserId;

    public bool $completedSuccessfully;

    public ?\DateTime $completionDatetime;

    public ?string $completionNotes;

    public int $jobTypeId;

    public int $jobbableId;

    public string $jobbableType;

    public int $lengthInMinutes;

    public ?\DateTime $scheduledDatetime;

    public int $ticketId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public Ticket $ticket;

    public JobType $jobType;

    public ?User $completedByUser;
}