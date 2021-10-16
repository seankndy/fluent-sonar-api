<?php

namespace SeanKndy\SonarApi\Resources;

class IpAssignmentHistory extends BaseResource
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
     * The date and time of assignment.
     */
    public \DateTime $assignedDatetime;

    /**
     * A human readable description.
     */
    public ?string $description;

    /**
     * The ID of an `IpAssignment`.
     */
    public ?int $ipAssignmentId;

    /**
     * The ID of the owner of this `IpAssignment`.
     */
    public ?int $ipassignmentableId;

    /**
     * The owner of this `IpAssignment`.
     */
    public string $ipassignmentableType;

    /**
     * The ID of the entity that the IP address was assigned to.
     */
    public int $ipassignmenthistoryableId;

    /**
     * The parent entity that the IP address was assigned to (e.g. `Account`, `NetworkSite`.)
     */
    public string $ipassignmenthistoryableType;

    /**
     * Some reference data regarding this IP assignment.
     */
    public ?string $reference;

    /**
     * The date and time of removal.
     */
    public ?\DateTime $removedDatetime;

    /**
     * If this IP was assigned automatically (e.g. via DHCP or RADIUS) then it will be marked as a soft assignment.
     */
    public bool $soft;

    /**
     * An IPv4/IPv6 subnet.
     */
    public string $subnet;

    /**
     * Some unique identifier that was related to the IP (e.g. a MAC address, IMSI, RADIUS username.)
     */
    public ?string $uniqueIdentifier;

    /**
     * An IP address assignment.
     */
    public ?IpAssignment $ipAssignment;

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