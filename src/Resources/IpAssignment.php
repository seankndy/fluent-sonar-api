<?php

namespace SeanKndy\SonarApi\Resources;

class IpAssignment extends BaseResource
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
     * A human readable description.
     */
    public ?string $description;

    /**
     * The ID of an `IpPool`.
     */
    public ?int $ipPoolId;

    /**
     * The ID of the owner of this `IpAssignment`.
     */
    public int $ipassignmentableId;

    /**
     * The owner of this `IpAssignment`.
     */
    public string $ipassignmentableType;

    /**
     * Some reference data regarding this IP assignment.
     */
    public ?string $reference;

    /**
     * If this IP was assigned automatically (e.g. via DHCP or RADIUS) then it will be marked as a soft assignment.
     */
    public bool $soft;

    /**
     * An IPv4/IPv6 subnet.
     */
    public string $subnet;

    /**
     * The ID of a `Subnet`.
     */
    public int $subnetId;

    /**
     * The `Subnet` this IP assignment falls within.
     */
    public ?Subnet $parentSubnet;

    /**
     * An IP pool, used for single address assignments (e.g. DHCP, PPPoE.)
     */
    public ?IpPool $ipPool;

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

    public function prefixLength(): int
    {
        if (\strstr($this->subnet, '/')) {
            [$network, $prefix] = \explode('/', $this->subnet);
            return \intval($prefix);
        }
        return \strstr($this->subnet, ':') === false ? 32 : 128;
    }

}
