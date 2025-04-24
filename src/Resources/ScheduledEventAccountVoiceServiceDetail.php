<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduledEventAccountVoiceServiceDetail extends BaseResource implements IdentityInterface
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
     * The amount that this service price has been overridden to. If this is null, then the service price is used.
     */
    public ?int $priceOverride;

    /**
     * The reason that the price of a service has been overridden.
     */
    public ?string $priceOverrideReason;

    /**
     * The quantity for this service.
     */
    public int $quantity;

    /**
     * The ID of a `ScheduledEvent`
     */
    public int $scheduledEventId;

    /**
     * The ID of a voice service configuration parameter.
     */
    public int $voiceServiceGenericParameterId;

    /**
     * An `Account` event that is run at a specific time.
     */
    public ?ScheduledEvent $scheduledEvent;

    /**
     * A configurable attribute for a voice service.
     */
    public ?VoiceServiceGenericParameter $voiceServiceGenericParameter;

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