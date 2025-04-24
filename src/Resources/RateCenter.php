<?php

namespace SeanKndy\SonarApi\Resources;

class RateCenter extends BaseResource implements IdentityInterface
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
     * Whether or not this entity is a default entry.
     */
    public bool $default;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A direct inward dial (DID).
     * @var \SeanKndy\SonarApi\Resources\Did[]
     */
    public array $dids;

    /**
     * A recipe for importing DIDs.
     * @var \SeanKndy\SonarApi\Resources\DidImportRecipe[]
     */
    public array $didImportRecipes;

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