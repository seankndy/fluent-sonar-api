<?php

namespace SeanKndy\SonarApi\Resources;

class TriggeredEmail extends BaseResource
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
     * The count associated with this `TriggeredEmail`. This is defined by the trigger, and could be something like a number of days, months, gigabytes, etc.
     */
    public ?int $count;

    /**
     * The ID of an EmailMessage.
     */
    public int $emailMessageId;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The ID of a `JobType`.
     */
    public ?int $jobTypeId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * If an item is protected, it cannot be modified or deleted.
     */
    public bool $protected;

    /**
     * The trigger for this email.
     */
    public string $trigger;

    /**
     * An email message.
     */
    public ?EmailMessage $emailMessage;

    /**
     * The type of a `Job`.
     */
    public ?JobType $jobType;

    /**
     * A categorization of an `Email` by type.
     * @var \SeanKndy\SonarApi\Resources\EmailCategory[]
     */
    public array $emailCategories;

    /**
     * An invoice.
     * @var \SeanKndy\SonarApi\Resources\Invoice[]
     */
    public array $invoices;

    /**
     * Accounts exceeding a data usage triggered email.
     * @var \SeanKndy\SonarApi\Resources\Account[]
     */
    public array $accountsExceedingUsageTriggers;

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