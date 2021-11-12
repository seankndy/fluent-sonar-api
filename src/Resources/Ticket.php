<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class Ticket extends BaseResource implements IdentityInterface
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
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

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

    public function latestReply(): ?TicketReply
    {
        return collect($this->ticketReplies)->sortByDesc(function(TicketReply $reply): int {
            return $reply->createdAt->getTimestamp();
        })->first();
    }

}
