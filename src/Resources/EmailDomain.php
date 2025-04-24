<?php

namespace SeanKndy\SonarApi\Resources;

class EmailDomain extends BaseResource implements IdentityInterface
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
     * Whether or not the DKIM record is valid.
     */
    public bool $dkim;

    /**
     * The DNS requirements for domain validation.
     */
    public ?string $dnsRequirements;

    /**
     * A domain name.
     */
    public string $domain;

    /**
     * The domain ID from the email provider.
     */
    public ?int $providerDomainId;

    /**
     * Indicates that the domain has been verified for migration.
     */
    public ?bool $readyForMigration;

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