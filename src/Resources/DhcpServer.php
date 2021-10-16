<?php

namespace SeanKndy\SonarApi\Resources;

class DhcpServer extends BaseResource
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
     * An API key.
     */
    public string $apiKey;

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
    public string $port;

    /**
     * Does this `DhcpServer` provide DHCP for all IP pools?
     */
    public bool $servesAllPools;

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
     * If this is `true`, then Sonar will use the MAC address of the DHCP relay rather than the MAC address of the requesting device when writing a lease. This should generally be disabled unless you have a specific reason to enable it.
     */
    public bool $useSourceMacAddress;

    /**
     * An IP pool, used for single address assignments (e.g. DHCP, PPPoE.)
     * @var \SeanKndy\SonarApi\Resources\IpPool[]
     */
    public array $ipPools;

    /**
     * A credential for a `DhcpServer`.
     * @var \SeanKndy\SonarApi\Resources\DhcpServerCredential[]
     */
    public array $dhcpServerCredentials;

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