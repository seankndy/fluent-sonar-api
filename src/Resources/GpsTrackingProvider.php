<?php

namespace SeanKndy\SonarApi\Resources;

class GpsTrackingProvider extends BaseResource implements IdentityInterface
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Whether OAuth authentication required.
     */
    public bool $oauthRequired;

    /**
     * A type of GPS tracking provider.
     */
    public string $provider;

    /**
     * `GpsTrackingProvider` credentials.
     * @var \SeanKndy\SonarApi\Resources\GpsTrackingProviderCredential[]
     */
    public array $gpsTrackingProviderCredentials;

    /**
     * A vehicle.
     * @var \SeanKndy\SonarApi\Resources\Vehicle[]
     */
    public array $vehicles;

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