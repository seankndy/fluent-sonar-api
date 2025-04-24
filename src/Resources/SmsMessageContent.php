<?php

namespace SeanKndy\SonarApi\Resources;

class SmsMessageContent extends BaseResource implements IdentityInterface
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
     * A supported language.
     */
    public string $language;

    /**
     * SMS message body for customers without portal.
     */
    public string $nonPortalBody;

    /**
     * SMS message body for customers with portal.
     */
    public string $portalBody;

    /**
     * The ID of the SMS message.
     */
    public int $smsMessageId;

    /**
     * An SMS message.
     */
    public ?SmsMessage $smsMessage;

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