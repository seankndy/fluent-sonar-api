<?php

namespace SeanKndy\SonarApi\Resources;

class FibermapIntegration extends BaseResource implements IdentityInterface
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
     * The ID of an AccountStatus.
     */
    public int $accountStatusId;

    /**
     * The ID of an AccountType.
     */
    public int $accountTypeId;

    /**
     * Always create new network sites
     */
    public bool $alwaysCreateNewNetworkSites;

    /**
     * An API token.
     */
    public string $apiToken;

    /**
     * The ID of the company that this entity operates under.
     */
    public int $companyId;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Import plans and contacts
     */
    public bool $importAccountsAndContacts;

    /**
     * Import serviceable addresses
     */
    public bool $importServiceableAddresses;

    /**
     * The date and time this device was last synchronized.
     */
    public ?\DateTime $lastSynchronized;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Allow serviceability status to be read from map features
     */
    public bool $readServiceabilityFromFeatures;

    /**
     * The status.
     */
    public ?string $status;

    /**
     * A message describing what caused the current status of this device.
     */
    public ?string $statusMessage;

    /**
     * Whether or not a synchronization request is queued.
     */
    public bool $synchronizationQueued;

    /**
     * The date/time that synchronization started.
     */
    public ?\DateTime $synchronizationStart;

    /**
     * Update service locations in Vetro Fibermap
     */
    public ?bool $updateServiceLocations;

    /**
     * FiberMap plan.
     * @var \SeanKndy\SonarApi\Resources\FibermapPlan[]
     */
    public array $fibermapPlans;

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