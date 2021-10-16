<?php

namespace SeanKndy\SonarApi\Resources;

class ServiceMetadata extends BaseResource
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
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * The value of a `ServiceMetadata` field, as it relates to a specific `Service` on a specific `Account`.
     * @var \SeanKndy\SonarApi\Resources\ServiceMetadataValue[]
     */
    public array $serviceMetadataValues;

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