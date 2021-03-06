<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class ExternalMarketingProvider extends BaseResource implements IdentityInterface
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The `ExternalMarketingProviderType` for 3rd party external marketing integration.
     */
    public string $provider;

    /**
     * The `ExternalMarketingProvider` credentials for integration.
     * @var \SeanKndy\SonarApi\Resources\ExternalMarketingProviderCredential[]
     */
    public array $externalMarketingProviderCredentials;

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