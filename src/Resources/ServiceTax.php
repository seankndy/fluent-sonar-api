<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class ServiceTax extends BaseResource implements IdentityInterface
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
     * The amount of the service that is exempt from taxation in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $exemptionAmount;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * The ID of a Tax.
     */
    public int $taxId;

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