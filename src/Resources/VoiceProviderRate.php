<?php

namespace SeanKndy\SonarApi\Resources;

class VoiceProviderRate extends BaseResource
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
     * The rate that is imported from a rate deck.
     */
    public float $baseRate;

    /**
     * The percentage over the base rate to charge the customer.
     */
    public float $chargePercent;

    /**
     * The rate that is charged to a customer.
     */
    public float $chargeRate;

    /**
     * The country of the rate.
     */
    public string $country;

    /**
     * The description for the rate.
     */
    public ?string $description;

    /**
     * The prefix for the rate.
     */
    public string $prefix;

    /**
     * The ID of a `VoiceProvider`.
     */
    public int $voiceProviderId;

    /**
     * A `VoiceProvider`.
     */
    public ?VoiceProvider $voiceProvider;

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