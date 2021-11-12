<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AvalaraTaxDefinition extends BaseResource implements IdentityInterface
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
     * Whether or not this entity is archived.
     */
    public bool $archived;

    /**
     * Whether or not this tax definition is custom.
     */
    public bool $isCustom;

    /**
     * The service name as defined by Avalara.
     */
    public string $serviceName;

    /**
     * The service type as defined by Avalara.
     */
    public int $serviceType;

    /**
     * The transaction name as defined by Avalara.
     */
    public string $transactionName;

    /**
     * The transaction type as defined by Avalara.
     */
    public int $transactionType;

    /**
     * The relationship between a `Service` and a `TaxDefinition`.
     * @var \SeanKndy\SonarApi\Resources\ServiceTaxDefinition[]
     */
    public array $serviceTaxDefinitions;

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