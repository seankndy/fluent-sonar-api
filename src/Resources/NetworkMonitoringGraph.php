<?php

namespace SeanKndy\SonarApi\Resources;

class NetworkMonitoringGraph extends BaseResource implements IdentityInterface
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
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a `NetworkMonitoringTemplate`.
     */
    public int $networkMonitoringTemplateId;

    /**
     * Stacked
     */
    public bool $stacked;

    /**
     * The type.
     */
    public string $type;

    /**
     * A `NetworkMonitoringTemplate`.
     */
    public ?NetworkMonitoringTemplate $networkMonitoringTemplate;

    /**
     * An `SnmpOid`.
     * @var \SeanKndy\SonarApi\Resources\SnmpOid[]
     */
    public array $snmpOids;

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