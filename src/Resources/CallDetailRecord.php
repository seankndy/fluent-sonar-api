<?php

namespace SeanKndy\SonarApi\Resources;

class CallDetailRecord extends BaseResource implements IdentityInterface
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
     * The ID of an Account.
     */
    public ?int $accountId;

    /**
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public ?float $amount;

    /**
     * The rate that is charged to a customer.
     */
    public ?float $chargeRate;

    /**
     * The prefix description for the call detail record having provider rated prefix.
     */
    public ?string $description;

    /**
     * The direction of the call.
     */
    public ?string $direction;

    /**
     * The total length of the call in seconds.
     */
    public int $lengthInSeconds;

    /**
     * The matched prefix of this call record.
     */
    public ?string $matchedPrefix;

    /**
     * The ID of a `MonthlyBillingCompletion`.
     */
    public ?int $monthlyBillingCompletionId;

    /**
     * The DID that initiated the call.
     */
    public ?string $originatingNumber;

    /**
     * The prefix type of this call record.
     */
    public ?string $prefixType;

    /**
     * The DID that received the call.
     */
    public ?string $receivingNumber;

    /**
     * The ID of a Service.
     */
    public ?int $serviceId;

    /**
     * When the call was started.
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