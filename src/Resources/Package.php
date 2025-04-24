<?php

namespace SeanKndy\SonarApi\Resources;

class Package extends BaseResource implements IdentityInterface
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
     * The ID of the company that this entity operates under.
     */
    public ?int $companyId;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Setting to indicate if services in this package should be rolled up into a package total when this package is displayed.
     */
    public bool $rollupServices;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * The relationship between an `Account` and a `Service`.
     * @var \SeanKndy\SonarApi\Resources\AccountService[]
     */
    public array $accountServices;

    /**
     * The relationship between a `Package` and a `Service`.
     * @var \SeanKndy\SonarApi\Resources\PackageService[]
     */
    public array $packageServices;

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