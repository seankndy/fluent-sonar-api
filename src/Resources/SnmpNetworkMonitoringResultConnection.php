<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpNetworkMonitoringResultConnection extends BaseResource
{
    /**
     * fields.network_monitoring_template
     */
    public ?NetworkMonitoringTemplate $networkMonitoringTemplate;

    /**
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * fields.snmp_result_connections
     * @var \SeanKndy\SonarApi\Resources\SnmpResult[]
     */
    public array $snmpResultConnection;

    /**
     * fields.snmp_status_results
     * @var \SeanKndy\SonarApi\Resources\SnmpStatusResult[]
     */
    public array $snmpStatusResults;

}