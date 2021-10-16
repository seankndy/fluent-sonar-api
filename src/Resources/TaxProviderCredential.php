<?php

namespace SeanKndy\SonarApi\Resources;

class TaxProviderCredential extends BaseResource
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
     * The credential name.
     */
    public string $credential;

    /**
     * The ID of an `TaxProvider`.
     */
    public int $taxProviderId;

    /**
     * The value.
     */
    public string $value;

    /**
     * A tax provider.
     */
    public ?TaxProvider $taxProvider;

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