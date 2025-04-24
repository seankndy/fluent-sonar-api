<?php

namespace SeanKndy\SonarApi\Resources;

class IntegrationServiceMapping extends BaseResource implements IdentityInterface
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
     * The profile vector name in Adtran Mosaic this mapping refers to.
     */
    public ?string $adtranMosaicProfileVector;

    /**
     * The ID of the configuration entity which owns this mapping.
     */
    public ?int $integrationconfigurableId;

    /**
     * The type of the configuration entity which owns this mapping.
     */
    public ?string $integrationconfigurableType;

    /**
     * Policy Map.
     */
    public ?string $policyMap;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * The service name in vendor system this mapping refers to.
     */
    public ?string $serviceTemplateName;

    /**
     * A service.
     */
    public ?Service $service;

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