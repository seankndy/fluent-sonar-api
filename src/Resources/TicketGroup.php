<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class TicketGroup extends BaseResource implements IdentityInterface
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * If a group is private, only members of the group can view emails within it.
     */
    public bool $private;

    /**
     * A ticket.
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

    /**
     * An inbound mailbox.
     * @var \SeanKndy\SonarApi\Resources\InboundMailbox[]
     */
    public array $inboundMailboxes;

    /**
     * A contract template.
     * @var \SeanKndy\SonarApi\Resources\ContractTemplate[]
     */
    public array $contractTemplates;

    /**
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

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