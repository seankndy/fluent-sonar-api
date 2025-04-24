<?php

namespace SeanKndy\SonarApi\Resources;

class GeoTaxZone extends BaseResource implements IdentityInterface
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
     * A city.
     */
    public ?string $city;

    /**
     * A two character country code.
     */
    public ?string $country;

    /**
     * A US county. Only used for US addresses.
     */
    public ?string $county;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The rate.
     */
    public float $rate;

    /**
     * A state, province, or other country subdivision.
     */
    public ?string $subdivision;

    /**
     * The ID of a Tax.
     */
    public int $taxId;

    /**
     * A ZIP or postal code.
     */
    public ?string $zip;

    /**
     * Whether to match on partial ZIP/postal codes.
     */
    public bool $zipPartialMatch;

    /**
     * A tax.
     */
    public ?Tax $tax;

    /**
     * A customer account.
     * @var \SeanKndy\SonarApi\Resources\Account[]
     */
    public array $accounts;

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