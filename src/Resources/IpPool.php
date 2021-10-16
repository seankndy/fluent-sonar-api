<?php

namespace SeanKndy\SonarApi\Resources;

class IpPool extends BaseResource
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
     * The ID of a `DhcpServerIdentifier`.
     */
    public ?int $dhcpServerIdentifierId;

    /**
     * A range of IPv4 addresses.
     */
    public string $ipRange;

    /**
     * The number of IP addresses available.
     */
    public int $ipsAvailable;

    /**
     * A descriptive name.
     */
    public ?string $name;

    /**
     * The ID of a `Subnet`.
     */
    public int $subnetId;

    /**
     * An IPv4/IPv6 subnet.
     */
    public ?Subnet $subnet;

    /**
     * A specific identifier for a DHCP server.
     */
    public ?DhcpServerIdentifier $dhcpServerIdentifier;

    /**
     * A DHCP server.
     * @var \SeanKndy\SonarApi\Resources\DhcpServer[]
     */
    public array $dhcpServers;

    /**
     * An LTE EPC.
     * @var \SeanKndy\SonarApi\Resources\Epc[]
     */
    public array $epcs;

    /**
     * An IP address assignment.
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

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