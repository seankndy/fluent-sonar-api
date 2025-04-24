<?php

namespace SeanKndy\SonarApi\Resources;

class SmsSetting extends BaseResource implements IdentityInterface
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
     * Whether the SMS funds are paid for automatically.
     */
    public bool $autoPay;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * A notification is sent if SMS funds fall below this value.
     */
    public int $lowFundsThreshold;

    /**
     * End of quiet time for sending SMS triggered messages.
     */
    public ?string $triggeredQuietEndTime;

    /**
     * Start of quiet time for sending SMS triggered messages.
     */
    public ?string $triggeredQuietStartTime;

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