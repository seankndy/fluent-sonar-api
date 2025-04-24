<?php

namespace SeanKndy\SonarApi\Resources;

class SmsMessage extends BaseResource implements IdentityInterface
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
     * Whether or not SMS message is used for triggers.
     */
    public bool $isTrigger;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * An SMS message content.
     * @var \SeanKndy\SonarApi\Resources\SmsMessageContent[]
     */
    public array $smsMessageContents;

    /**
     * A message that is sent when a specific event occurs.
     * @var \SeanKndy\SonarApi\Resources\TriggeredMessage[]
     */
    public array $triggeredMessages;

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