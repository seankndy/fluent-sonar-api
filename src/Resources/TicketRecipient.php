<?php

namespace SeanKndy\SonarApi\Resources;

class TicketRecipient extends BaseResource
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
     * An email address.
     */
    public string $emailAddress;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a `Ticket`.
     */
    public int $ticketId;

    /**
     * A ticket.
     */
    public ?Ticket $ticket;

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