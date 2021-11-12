<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class NetworkMonitoringTemplate extends BaseResource implements IdentityInterface
{
    use HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Whether or not to collect interface statistics.
     */
    public bool $collectInterfaceStatistics;

    /**
     * ICMP latency threshold (ms).
     */
    public ?int $icmpLatencyThreshold;

    /**
     * ICMP loss threshold (%).
     */
    public ?int $icmpLossThreshold;

    /**
     * Whether or not ICMP monitoring is enabled.
     */
    public bool $icmpMonitoring;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * SNMPv3 auth passphrase
     */
    public ?string $snmp3AuthPassphrase;

    /**
     * SNMPv3 auth protocol
     */
    public ?string $snmp3AuthProtocol;

    /**
     * SNMPv3 context engine ID
     */
    public ?string $snmp3ContextEngineid;

    /**
     * SNMPv3 context name
     */
    public ?string $snmp3ContextName;

    /**
     * SNMPv3 privacy passphrase
     */
    public ?string $snmp3PrivPassphrase;

    /**
     * SNMPv3 privacy protocol
     */
    public ?string $snmp3PrivProtocol;

    /**
     * SNMPv3 security level
     */
    public ?string $snmp3SecLevel;

    /**
     * SNMP community/securityName
     */
    public ?string $snmpCommunity;

    /**
     * SNMP version
     */
    public ?string $snmpVersion;

    /**
     * A type of item stored in inventory.
     * @var \SeanKndy\SonarApi\Resources\InventoryModel[]
     */
    public array $inventoryModels;

    /**
     * The mode that an inventory item is deployed in.
     * @var \SeanKndy\SonarApi\Resources\DeploymentType[]
     */
    public array $deploymentTypes;

    /**
     * A `NetworkMonitoringGraph`.
     * @var \SeanKndy\SonarApi\Resources\NetworkMonitoringGraph[]
     */
    public array $networkMonitoringGraphs;

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