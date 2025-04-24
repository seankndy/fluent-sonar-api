<?php

namespace SeanKndy\SonarApi\Resources;

class EmailMessage extends BaseResource implements IdentityInterface
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
     * The email address to send from when using this email message. If `null`, then the system default will be used.
     */
    public string $fromEmailAddress;

    /**
     * The name to send from when using this email message. If `null`, then the system default will be used.
     */
    public ?string $fromName;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * ID of the Saved Message Category.
     */
    public ?int $savedMessageCategoryId;

    /**
     * The localized content of an `EmailMessage`.
     * @var \SeanKndy\SonarApi\Resources\EmailMessageContent[]
     */
    public array $emailMessageContents;

    /**
     * A message that is sent when a specific event occurs.
     * @var \SeanKndy\SonarApi\Resources\TriggeredMessage[]
     */
    public array $triggeredMessages;

    /**
     * Saved message category.
     */
    public ?SavedMessageCategory $savedMessageCategory;

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