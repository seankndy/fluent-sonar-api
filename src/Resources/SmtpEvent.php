<?php

namespace SeanKndy\SonarApi\Resources;

class SmtpEvent extends BaseResource implements IdentityInterface
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
     * The remote IP address of the server Mandrill was connected to for message relay when attempting to send an email.
     */
    public string $destinationIp;

    /**
     * The ID of an email.
     */
    public int $emailId;

    /**
     * The date and time of an event sent from Mandrill
     */
    public \DateTime $eventDatetime;

    /**
     * The message of the SMTP response.
     */
    public string $response;

    /**
     * The size of a SMTP message that Mandrill attempted to relay.
     */
    public int $size;

    /**
     * The IP address of the Mandrill server that attempted to send an email.
     */
    public string $sourceIp;

    /**
     * The type.
     */
    public string $type;

    /**
     * An email.
     */
    public ?Email $email;

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