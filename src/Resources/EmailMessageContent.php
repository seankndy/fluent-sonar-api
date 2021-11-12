<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class EmailMessageContent extends BaseResource implements IdentityInterface
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
     * The body.
     */
    public string $body;

    /**
     * The ID of an EmailMessage.
     */
    public int $emailMessageId;

    /**
     * A short sentence that will be shown as a preview in compatible email clients.
     */
    public ?string $inboxPreview;

    /**
     * A supported language.
     */
    public string $language;

    /**
     * The subject.
     */
    public string $subject;

    /**
     * An email message.
     */
    public ?EmailMessage $emailMessage;

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