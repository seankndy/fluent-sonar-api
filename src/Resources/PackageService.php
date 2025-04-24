<?php

namespace SeanKndy\SonarApi\Resources;

class PackageService extends BaseResource implements IdentityInterface
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
     * The ID of a `Package`.
     */
    public int $packageId;

    /**
     * The quantity for this service.
     */
    public int $quantity;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * A collection of `Service`s.
     */
    public ?Package $package;

    /**
     * A service.
     */
    public ?Service $service;

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