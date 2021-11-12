<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class EmailDomain extends BaseResource implements IdentityInterface
{
    use HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Whether or not the DKIM record is valid.
     */
    public bool $dkim;

    /**
     * A domain name.
     */
    public string $domain;

    /**
     * Whether or not the SPF record is valid.
     */
    public bool $spf;

    /**
     * Whether or not the record is verified.
     */
    public bool $verified;

    /**
     * An inbound mailbox.
     * @var \SeanKndy\SonarApi\Resources\InboundMailbox[]
     */
    public array $inboundMailboxes;

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