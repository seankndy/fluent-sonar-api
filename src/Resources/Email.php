<?php

namespace SeanKndy\SonarApi\Resources;

class Email extends BaseResource implements IdentityInterface
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
     * The body.
     */
    public ?string $body;

    /**
     * An email address.
     */
    public string $emailAddress;

    /**
     * The ID of the entity that this email was sent to.
     */
    public int $emailableId;

    /**
     * The type of entity that this email was sent to.
     */
    public string $emailableType;

    /**
     * If rejected, the reason for rejection.
     */
    public ?string $rejectReason;

    /**
     * The status.
     */
    public string $status;

    /**
     * The subject.
     */
    public string $subject;

    /**
     * The name of the recipient.
     */
    public ?string $toName;

    /**
     * A single SMTP event for an email.
     * @var \SeanKndy\SonarApi\Resources\SmtpEvent[]
     */
    public array $smtpEvents;

    /**
     * A single open for a sent email.
     * @var \SeanKndy\SonarApi\Resources\EmailOpen[]
     */
    public array $emailOpens;

    /**
     * A single click for a sent email.
     * @var \SeanKndy\SonarApi\Resources\EmailClick[]
     */
    public array $emailClicks;

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