<?php

namespace SeanKndy\SonarApi\Resources;

class Subnet extends BaseResource
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
     * The largest subnet available, as a CIDR mask.
     */
    public ?int $largestCidrAvailable;

    /**
     * A descriptive name.
     */
    public ?string $name;

    /**
     * The ID of a `Poller`.
     */
    public ?int $pollerId;

    /**
     * Polling priority.
     */
    public int $pollingPriority;

    /**
     * An IPv4/IPv6 subnet.
     */
    public string $subnet;

    /**
     * The ID of a `Supernet`.
     */
    public int $supernetId;

    /**
     * The type.
     */
    public string $type;

    /**
     * The largest example of a unique subnet on your network. A supernet contains many subnets. An example of a supernet is 10.0.0.0/8.
     */
    public ?Supernet $supernet;

    /**
     * A `Poller`.
     */
    public ?Poller $poller;

    /**
     * An IP pool, used for single address assignments (e.g. DHCP, PPPoE.)
     * @var \SeanKndy\SonarApi\Resources\IpPool[]
     */
    public array $ipPools;

    /**
     * An IP address assignment.
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

    /**
     * A device that sits inline with customer traffic to impose network policy.
     * @var \SeanKndy\SonarApi\Resources\InlineDevice[]
     */
    public array $inlineDevices;

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