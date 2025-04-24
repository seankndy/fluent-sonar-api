<?php

namespace SeanKndy\SonarApi\Resources;

class Supernet extends BaseResource implements IdentityInterface
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
     * The largest subnet available, as a CIDR mask.
     */
    public ?int $largestCidrAvailable;

    /**
     * A descriptive name.
     */
    public ?string $name;

    /**
     * An IPv4/IPv6 subnet.
     */
    public string $subnet;

    /**
     * An IPv4/IPv6 subnet.
     * @var \SeanKndy\SonarApi\Resources\Subnet[]
     */
    public array $subnets;

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