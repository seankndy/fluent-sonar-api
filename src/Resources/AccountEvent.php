<?php

namespace SeanKndy\SonarApi\Resources;

class AccountEvent extends BaseResource
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * Current data.
     */
    public ?string $current;

    /**
     * An event.
     */
    public string $event;

    /**
     * The date and time of an event sent from Mandrill
     */
    public \DateTime $eventDatetime;

    /**
     * Previous data.
     */
    public ?string $previous;

    /**
     * A customer account.
     */
    public ?Account $account;

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