<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class ExternalMarketingProviderCredential extends BaseResource implements IdentityInterface
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
     * The ID of an `ExternalMarketingProvider`.
     */
    public int $externalMarketingProviderId;

    /**
     * Key for a specific value.
     */
    public string $key;

    /**
     * The value.
     */
    public string $value;

    /**
     * A `ExternalMarketingProviderType` for `ExternalMarketingProvider` 3rd party integration.
     */
    public ?ExternalMarketingProvider $externalMarketingProvider;

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