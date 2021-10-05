<?php

namespace SeanKndy\SonarApi\Resources;

class JobType extends BaseResource
{
    public int $id;

    public ?int $accountStatusIdCompletion;

    public ?int $accountStatusIdFailure;

    public bool $allCompanies;

    public bool $allowCompletionWithIncompleteTasks;

    public string $color;

    public ?int $contractTemplateId;

    public ?int $defaultLengthInMinutes;

    public bool $enabled;

    public string $icon;

    public string $name;

    public ?int $taskTemplateId;

    public ?int $ticketGroupIdCompletion;

    public ?int $ticketGroupIdFailure;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}