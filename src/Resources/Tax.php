<?php

namespace SeanKndy\SonarApi\Resources;

class Tax extends BaseResource implements IdentityInterface
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
     * Whether this `Tax` is applied as a percentage of the `Service` charge, or as a flat rate.
     */
    public string $application;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The rate for a tax. For a percentage based tax, this is a percentage. For a flat tax, it is a currency value in the smallest currency unit (e.g. cents, pence, pesos.)
     */
    public float $rate;

    /**
     * Whether this tax is applied based on the account being in a specific geography, or whether it is applied to all accounts.
     */
    public string $type;

    /**
     * A geographical tax zone.
     * @var \SeanKndy\SonarApi\Resources\GeoTaxZone[]
     */
    public array $geoTaxZones;

    /**
     * The relationship between a `Service` and a `Tax`.
     * @var \SeanKndy\SonarApi\Resources\ServiceTax[]
     */
    public array $serviceTaxes;

    /**
     * An override to the default taxation rate.
     * @var \SeanKndy\SonarApi\Resources\TaxOverride[]
     */
    public array $taxOverrides;

    /**
     * The relationship between a `VoiceServiceGenericParameter` and a `Tax`.
     * @var \SeanKndy\SonarApi\Resources\VoiceServiceGenericParameterTax[]
     */
    public array $voiceServiceGenericParameterTaxes;

    /**
     * A third party vendor of inventory models.
     * @var \SeanKndy\SonarApi\Resources\Vendor[]
     */
    public array $vendors;

    /**
     * A line item on a purchase order.
     * @var \SeanKndy\SonarApi\Resources\PurchaseOrderItem[]
     */
    public array $purchaseOrderItems;

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