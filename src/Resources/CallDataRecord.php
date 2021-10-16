<?php

namespace SeanKndy\SonarApi\Resources;

class CallDataRecord extends BaseResource
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
     * The ID of an Account.
     */
    public ?int $accountId;

    /**
     * If and when the call was answered.
     */
    public ?\DateTime $answeredAt;

    /**
     * The total length of the call in seconds.
     */
    public int $lengthInSeconds;

    /**
     * Whether or not this call was local.
     */
    public ?bool $local;

    /**
     * Whether or not this call was long distance.
     */
    public ?bool $longDistance;

    /**
     * The matched prefix of this call record.
     */
    public ?string $matchedPrefix;

    /**
     * The ID of a `MonthlyBillingCompletion`.
     */
    public ?int $monthlyBillingCompletionId;

    /**
     * The country of the originating side of a call.
     */
    public ?string $originatingCountry;

    /**
     * The DID that initiated the call.
     */
    public ?string $originatingNumber;

    /**
     * The prefix type of this call record.
     */
    public ?string $prefixType;

    /**
     * The rate.
     */
    public ?float $rate;

    /**
     * The country of the receiving side of a call.
     */
    public ?string $receivingCountry;

    /**
     * The DID that received the call.
     */
    public ?string $receivingNumber;

    /**
     * The ID of a Service.
     */
    public ?int $serviceId;

    /**
     * When the call was started_at.
     */
    public \DateTime $startedAt;

    /**
     * The ID of a `VoiceProvider`.
     */
    public int $voiceProviderId;

    /**
     * A `VoiceProvider`.
     */
    public ?VoiceProvider $voiceProvider;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * A record of a monthly billing cycle.
     */
    public ?MonthlyBillingCompletion $monthlyBillingCompletion;

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