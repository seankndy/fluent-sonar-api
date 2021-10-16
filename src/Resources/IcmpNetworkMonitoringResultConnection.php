<?php

namespace SeanKndy\SonarApi\Resources;

class IcmpNetworkMonitoringResultConnection extends BaseResource
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
     * fields.icmp_results
     * @var \SeanKndy\SonarApi\Resources\IcmpResult[]
     */
    public array $icmpResults;

    /**
     * fields.icmp_status_results
     * @var \SeanKndy\SonarApi\Resources\IcmpStatusResult[]
     */
    public array $icmpStatusResults;

}