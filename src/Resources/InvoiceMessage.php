<?php

namespace SeanKndy\SonarApi\Resources;

class InvoiceMessage extends BaseResource
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
     * The message.
     */
    public string $message;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The account type.
     * @var \SeanKndy\SonarApi\Resources\AccountType[]
     */
    public array $accountTypes;

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