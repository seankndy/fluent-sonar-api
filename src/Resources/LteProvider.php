<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class LteProvider extends BaseResource implements IdentityInterface
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
     * Automatically detach UE when account is changed to delinquency status.
     */
    public bool $deactivateOnDelinquency;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The date and time this device was last synchronized.
     */
    public ?\DateTime $lastSynchronized;

    /**
     * A descriptive name.
     */
    public string $name;

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
     * The type.
     */
    public string $type;

    /**
     * Write PDN address allocation into BreezeVIEW.
     */
    public bool $writePdnAddressAllocation;

    /**
     * Credentials for an `LteProvider`.
     * @var \SeanKndy\SonarApi\Resources\LteProviderCredential[]
     */
    public array $lteProviderCredentials;

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