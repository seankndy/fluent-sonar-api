<?php

namespace SeanKndy\SonarApi\Resources;

class EmailClick extends BaseResource implements IdentityInterface
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
     * The ID of an email.
     */
    public int $emailId;

    /**
     * The ID of a location associated with a record in EmailClick and EmailOpen.
     */
    public ?int $emailLocationId;

    /**
     * The date and time of an event sent from Mandrill
     */
    public \DateTime $eventDatetime;

    /**
     * An IPv4/IPv6 address.
     */
    public string $ip;

    /**
     * The URL that a user clicked on in a sent email.
     */
    public string $url;

    /**
     * The user agent string of a user that opened or clicked on a sent email.
     */
    public string $userAgent;

    /**
     * An email.
     */
    public ?Email $email;

    /**
     * The location of a single opened or clicked email.
     */
    public ?EmailLocation $emailLocation;

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