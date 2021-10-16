<?php

namespace SeanKndy\SonarApi\Resources;

class TicketReply extends BaseResource
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
     * The author.
     */
    public ?string $author;

    /**
     * The email address of the author.
     */
    public ?string $authorEmail;

    /**
     * The body.
     */
    public string $body;

    /**
     * The email headers.
     */
    public ?string $headers;

    /**
     * Whether or not the reply was incoming (from an external party) or outgoing (from a Sonar `User`.)
     */
    public bool $incoming;

    /**
     * The raw body, before any Sonar parsing.
     */
    public ?string $rawBody;

    /**
     * The signature to append. You can include `[PUBLIC_NAME]` as a variable to insert the user's public name when the signature is appended.
     */
    public ?string $signature;

    /**
     * The ID of a `Ticket`.
     */
    public int $ticketId;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * A ticket.
     */
    public ?Ticket $ticket;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * An email.
     * @var \SeanKndy\SonarApi\Resources\Email[]
     */
    public array $emails;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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