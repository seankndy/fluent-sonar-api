<?php

namespace SeanKndy\SonarApi\Resources;

class Ticket extends BaseResource
{
    public int $id;

    public ?int $parentTicketId;

    public int $ticketableId;

    public string $ticketableType;

    public string $status;

    public string $description;

    public string $subject;

    public ?\DateTime $closedAt;

    public ?\DateTime $dueDate;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    /**
     * @var \SeanKndy\SonarApi\Resources\TicketCategory[]
     */
    public array $ticketCategories;

    public TicketGroup $ticketGroup;

    /**
     * @var \SeanKndy\SonarApi\Resources\TicketRecipient[]
     */
    public array $ticketRecipients;

    /**
     * @var \SeanKndy\SonarApi\Resources\TicketReply[]
     */
    public array $ticketReplies;

    /**
     * @var \SeanKndy\SonarApi\Resources\TicketComment[]
     */
    public array $ticketComments;

    public function latestReply(): ?TicketReply
    {
        return collect($this->ticketReplies)->sortByDesc(function ($reply) {
            return $reply->createdAt->getTimestamp();
        })->first();
    }

}