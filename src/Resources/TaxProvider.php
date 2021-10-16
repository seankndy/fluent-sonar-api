<?php

namespace SeanKndy\SonarApi\Resources;

class TaxProvider extends BaseResource
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The list of subdivisions where this tax provider will collect taxes.
     * @var string[]
     */
    public ?array $subdivisions;

    /**
     * The type.
     */
    public string $type;

    /**
     * A tax exemption.
     * @var \SeanKndy\SonarApi\Resources\TaxExemption[]
     */
    public array $taxExemptions;

    /**
     * Credentials for a `TaxProvider`.
     * @var \SeanKndy\SonarApi\Resources\TaxProviderCredential[]
     */
    public array $taxProviderCredentials;

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