<?php

namespace SeanKndy\SonarApi\Resources;

class InboundMailbox extends BaseResource
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
     * Whether or not to append a signature.
     */
    public bool $appendSignature;

    /**
     * The auto reply to send.
     */
    public ?string $autoReply;

    /**
     * The ID of an `EmailDomain`.
     */
    public int $emailDomainId;

    /**
     * Whether or not to enable Slack integration.
     */
    public bool $enableSlackIntegration;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The mailbox email is sent from.
     */
    public string $fromMailbox;

    /**
     * The name to send from when using this email message. If `null`, then the system default will be used.
     */
    public string $fromName;

    /**
     * The inbound mailbox.
     */
    public string $inboundMailbox;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Whether the email body should be posted to Slack, or just the email subject.
     */
    public ?bool $postEmailBodyToSlack;

    /**
     * The priority of this item.
     */
    public string $priority;

    /**
     * Whether or not an auto reply should be sent.
     */
    public bool $sendAutoReply;

    /**
     * The signature to append. You can include `[PUBLIC_NAME]` as a variable to insert the user's public name when the signature is appended.
     */
    public ?string $signature;

    /**
     * The URL of a Slack webhook. You can generate one at https://my.slack.com/services/new/incoming-webhook.
     */
    public ?string $slackWebhookUrl;

    /**
     * The ID of a `TicketGroup`.
     */
    public int $ticketGroupId;

    /**
     * An email domain.
     */
    public ?EmailDomain $emailDomain;

    /**
     * A ticket.
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

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