<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class JobService extends BaseResource implements IdentityInterface
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
     * The ID of a `Job`.
     */
    public int $jobId;

    /**
     * The quantity for this service.
     */
    public int $quantity;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * A tax.
     */
    public ?Tax $tax;

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