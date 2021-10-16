<?php

namespace SeanKndy\SonarApi\Resources;

class GpsTrackingProviderCredential extends BaseResource
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
     * A `GpsTrackingProvider` ID.
     */
    public int $gpsTrackingProviderId;

    /**
     * Key for a specific value.
     */
    public string $key;

    /**
     * The value.
     */
    public string $value;

    /**
     * A `GpsTrackingProvider`.
     */
    public ?GpsTrackingProvider $gpsTrackingProvider;

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