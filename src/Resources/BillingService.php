<?php

namespace SeanKndy\SonarApi\Resources;

class BillingService extends BaseResource implements IdentityInterface
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
     * The amount of the service that will be invoiced to the anchor account.  Cannot exceed price provided.
     */
    public ?int $anchorSubsidy;

    /**
     * The ID of a BillingDefault.
     */
    public int $billingDefaultId;

    /**
     * Overriding the service name will alter the service name printed on an invoice.
     */
    public ?string $nameOverride;

    /**
     * The price per unit of this item.
     */
    public ?int $price;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * Default billing settings that are applied to some accounts on creation.
     */
    public ?BillingDefault $billingDefault;

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