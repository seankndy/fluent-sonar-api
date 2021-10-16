<?php

namespace SeanKndy\SonarApi\Resources;

class ServiceTaxDefinition extends BaseResource
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
     * Whether this tax definition is for a discount or not.
     */
    public bool $discount;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * The ID of entity this tax definition is related to.
     */
    public int $taxdefinitionableId;

    /**
     * The type of entity this tax definition is related to.
     */
    public string $taxdefinitionableType;

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