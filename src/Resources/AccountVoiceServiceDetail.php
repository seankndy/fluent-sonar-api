<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AccountVoiceServiceDetail extends BaseResource implements IdentityInterface
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
     * The ID of an AccountService.
     */
    public int $accountServiceId;

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
     * The ID of a voice service configuration parameter.
     */
    public int $voiceServiceGenericParameterId;

    /**
     * The relationship between an `Account` and a `Service`.
     */
    public ?AccountService $accountService;

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