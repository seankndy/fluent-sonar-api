<?php

namespace SeanKndy\SonarApi\Resources;

class SmsOutboundMessage extends BaseResource implements IdentityInterface
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
     * The category of the message.
     */
    public string $category;

    /**
     * The cost associated with the SMS message. Stored as one hundredth of the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $costInHundredths;

    /**
     * The country code of the destination mobile phone number.
     */
    public ?string $destinationCountry;

    /**
     * The error message.
     */
    public string $errorMessage;

    /**
     * The provider message ID.
     */
    public ?\DateTime $lastStatusCheck;

    /**
     * The message text.
     */
    public string $messageText;

    /**
     * The destination mobile phone number.
     */
    public string $mobileNumber;

    /**
     * The provider message ID.
     */
    public ?string $providerMessageId;

    /**
     * The number of segments needed to deliver message text.
     */
    public int $segments;

    /**
     * The ID of the entity that this SMS was sent to.
     */
    public int $smsableId;

    /**
     * The type of entity that this SMS was sent to.
     */
    public string $smsableType;

    /**
     * The current status of the message.
     */
    public string $status;

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