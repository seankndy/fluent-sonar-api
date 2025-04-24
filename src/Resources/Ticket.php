<?php

namespace SeanKndy\SonarApi\Resources;

class Ticket extends BaseResource implements IdentityInterface
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
     * The last date and time this entity was updated, or was the subject of a log.
     */
    public ?\DateTime $globalUpdatedAt;

    /**
     * The time this was closed at.
     */
    public ?\DateTime $closedAt;

    /**
     * The ID of the `User` that closed this.
     */
    public ?int $closedByUserId;

    /**
     * The ID of the company that this entity operates under.
     */
    public ?int $companyId;

    /**
     * A human readable description.
     */
    public string $description;

    /**
     * The date this invoice is due by.
     */
    public ?string $dueDate;

    /**
     * The ID of an `InboundMailbox`.
     */
    public ?int $inboundMailboxId;

    /**
     * The ID of the `Ticket` that this `Ticket` is a child of.
     */
    public ?int $parentTicketId;

    /**
     * The priority of this item.
     */
    public string $priority;

    /**
     * Mail processor's spam rating for whether or not this is spam.
     */
    public ?float $spamScore;

    /**
     * The status.
     */
    public string $status;

    /**
     * The subject.
     */
    public string $subject;

    /**
     * The ID of a `TicketGroup`.
     */
    public ?int $ticketGroupId;

    /**
     * The ID of the entity that this `Ticket` is associated with.
     */
    public ?int $ticketableId;

    /**
     * The type of entity that this `Ticket` is associated with.
     */
    public ?string $ticketableType;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * A ticket group.
     */
    public ?TicketGroup $ticketGroup;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * An inbound mailbox.
     */
    public ?InboundMailbox $inboundMailbox;

    /**
     * The `Ticket` that is a parent of this `Ticket`.
     */
    public ?Ticket $parentTicket;

    /**
     * The `User` that closed this.
     */
    public ?User $closedByUser;

    /**
     * A ticket category.
     * @var \SeanKndy\SonarApi\Resources\TicketCategory[]
     */
    public array $ticketCategories;

    /**
     * An inventory item.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $inventoryItems;

    /**
     * A network site.
     * @var \SeanKndy\SonarApi\Resources\NetworkSite[]
     */
    public array $networkSites;

    /**
     * A ticket recipient.
     * @var \SeanKndy\SonarApi\Resources\TicketRecipient[]
     */
    public array $ticketRecipients;

    /**
     * A reply on a `Ticket`.
     * @var \SeanKndy\SonarApi\Resources\TicketReply[]
     */
    public array $ticketReplies;

    /**
     * `Ticket`s that are children of this `Ticket`.
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $childTickets;

    /**
     * A comment on a `Ticket`.
     * @var \SeanKndy\SonarApi\Resources\TicketComment[]
     */
    public array $ticketComments;

    /**
     * A job, typically in the field.
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

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
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

    /**
     * A subscription to notifications for an entity.
     * @var \SeanKndy\SonarApi\Resources\Subscription[]
     */
    public array $subscriptions;

    /**
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

    /**
     * Data entered into a `CustomField`.
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

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

    /**
     * Get the latest TicketReply.
     *
     * @return TicketReply|null
     */
    public function latestReply(): ?TicketReply
    {
        return collect($this->ticketReplies)->sortByDesc(function(TicketReply $reply): int {
            return $reply->createdAt->getTimestamp();
        })->first();
    }
}