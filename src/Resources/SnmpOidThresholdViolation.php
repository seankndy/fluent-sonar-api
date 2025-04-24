<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpOidThresholdViolation extends BaseResource implements IdentityInterface
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
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * The ID of an `SnmpOidThreshold`.
     */
    public int $snmpOidThresholdId;

    /**
     * An `SnmpOidThreshold`.
     */
    public ?SnmpOidThreshold $snmpOidThreshold;

    /**
     * An inventory item.
     */
    public ?InventoryItem $inventoryItem;

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