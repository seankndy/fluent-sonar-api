<?php

namespace SeanKndy\SonarApi\Resources;

class RadiusServer extends BaseResource implements IdentityInterface
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
     * The secret used to send a change of authorization to this device.
     */
    public ?string $coaSecret;

    /**
     * Whether or not Sonar should track bandwidth usage data from this RADIUS server.
     */
    public bool $collectBandwidth;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * An IPv4/IPv6 address.
     */
    public string $ipAddress;

    /**
     * The date and time this device was last synchronized.
     */
    public ?\DateTime $lastSynchronized;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Send a change of authorization on account delinquency to this device.
     */
    public bool $sendChangeAuthOnDelinquency;

    /**
     * Send a change of authorization on account service change to this device.
     */
    public bool $sendChangeAuthOnServiceChange;

    /**
     * Send a change of authorization on account status change to this device.
     */
    public bool $sendChangeAuthOnStatusChange;

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
     * A RADIUS server credential.
     * @var \SeanKndy\SonarApi\Resources\RadiusServerCredential[]
     */
    public array $radiusServerCredentials;

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