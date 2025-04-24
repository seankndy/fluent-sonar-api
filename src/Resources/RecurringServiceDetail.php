<?php

namespace SeanKndy\SonarApi\Resources;

class RecurringServiceDetail extends BaseResource implements IdentityInterface
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
     * How often this service bills, in months.
     */
    public int $billingFrequency;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

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