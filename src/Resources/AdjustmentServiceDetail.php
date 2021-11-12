<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AdjustmentServiceDetail extends BaseResource implements IdentityInterface
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
     * The amount that can be adjusted using this service within the period defined in `adjustment_service_days`.
     */
    public ?int $amount;

    /**
     * The period of time in which transactions are tracked to calculate against the total defined in `adjustment_service_amount`.
     */
    public ?int $days;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * A role defines the permission set that a user has.
     * @var \SeanKndy\SonarApi\Resources\Role[]
     */
    public array $roles;

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