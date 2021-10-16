<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpOid extends BaseResource
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
     * Whether or not to auto scale.
     */
    public bool $autoScale;

    /**
     * Color.
     */
    public string $color;

    /**
     * Display as table
     */
    public bool $displayAsTable;

    /**
     * Divide by
     */
    public ?int $divideBy;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a `NetworkMonitoringGraph`.
     */
    public int $networkMonitoringGraphId;

    /**
     * An OID
     */
    public string $oid;

    /**
     * Unit of measurement
     */
    public ?string $unitOfMeasurement;

    /**
     * A `NetworkMonitoringGraph`.
     */
    public ?NetworkMonitoringGraph $networkMonitoringGraph;

    /**
     * An `SnmpOidThreshold`.
     * @var \SeanKndy\SonarApi\Resources\SnmpOidThreshold[]
     */
    public array $snmpOidThresholds;

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