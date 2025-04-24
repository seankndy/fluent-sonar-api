<?php

namespace SeanKndy\SonarApi\Resources;

class InlineDevice extends BaseResource implements IdentityInterface
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
     * Whether this device should write entries for all subnets or not.
     */
    public bool $allSubnets;

    /**
     * Whether or not a bandwidth collection request is queued.
     */
    public bool $bandwidthCollectionQueued;

    /**
     * The date/time that bandwidth collection started.
     */
    public ?\DateTime $bandwidthCollectionStart;

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
     * A TCP port.
     */
    public ?string $port;

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
     * An IPv4/IPv6 subnet.
     * @var \SeanKndy\SonarApi\Resources\Subnet[]
     */
    public array $subnets;

    /**
     * An inline device credential.
     * @var \SeanKndy\SonarApi\Resources\InlineDeviceCredential[]
     */
    public array $inlineDeviceCredentials;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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