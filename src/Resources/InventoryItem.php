<?php

namespace SeanKndy\SonarApi\Resources;

class InventoryItem extends BaseResource
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
     * The ID of the `User` that claimed this.
     */
    public ?int $claimedUserId;

    /**
     * The ID of a `DeploymentType`.
     */
    public ?int $deploymentTypeId;

    /**
     * Whether this inventory item is flapping or not.
     */
    public bool $flapping;

    /**
     * The current ICMP monitoring status of an `InventoryItem`.
     */
    public ?string $icmpDeviceStatus;

    /**
     * The number of times the ICMP status has flapped.
     */
    public int $icmpStatusFlapCount;

    /**
     * The timestamp of when the ICMP status last changed.
     */
    public ?\DateTime $icmpStatusLastChange;

    /**
     * The ICMP monitoring threshold violation type.
     */
    public ?string $icmpThresholdViolation;

    /**
     * The ID of an `InventoryModel`.
     */
    public int $inventoryModelId;

    /**
     * The ID of the entity that this inventory item is assigned to.
     */
    public int $inventoryitemableId;

    /**
     * The type of entity that this inventory item is assigned to.
     */
    public string $inventoryitemableType;

    /**
     * The metadata.
     */
    public ?string $metadata;

    /**
     * The overall status of an `InventoryItem` (the worse of ICMP/SNMP status).
     */
    public ?string $overallStatus;

    /**
     * The ID of the parent `InventoryItem`.
     */
    public ?int $parentInventoryItemId;

    /**
     * The status of the device, as read from Preseem.
     */
    public ?string $preseemStatus;

    /**
     * The ID of a purchase order item
     */
    public ?int $purchaseOrderItemId;

    /**
     * The purchase price of this item.
     */
    public ?int $purchasePrice;

    /**
     * The current SNMP monitoring status of an `InventoryItem`.
     */
    public ?string $snmpDeviceStatus;

    /**
     * The number of times the SNMP status has flapped.
     */
    public int $snmpStatusFlapCount;

    /**
     * The timestamp of when the SNMP status last changed.
     */
    public ?\DateTime $snmpStatusLastChange;

    /**
     * The SNMP monitoring status message.
     */
    public ?string $snmpStatusMessage;

    /**
     * The physical status of this item.
     */
    public string $status;

    /**
     * A type of item stored in inventory.
     */
    public ?InventoryModel $inventoryModel;

    /**
     * The mode that an inventory item is deployed in.
     */
    public ?DeploymentType $deploymentType;

    /**
     * A line item on a purchase order.
     */
    public ?PurchaseOrderItem $purchaseOrderItem;

    /**
     * The parent `InventoryItem`.
     */
    public ?InventoryItem $parentInventoryItem;

    /**
     * The user that claimed this `InventoryItem`.
     */
    public ?User $claimedUser;

    /**
     * A ticket.
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

    /**
     * Data contained within an inventory item field.
     * @var \SeanKndy\SonarApi\Resources\InventoryModelFieldData[]
     */
    public array $inventoryModelFieldData;

    /**
     * An `SnmpOidThresholdViolation`.
     * @var \SeanKndy\SonarApi\Resources\SnmpOidThresholdViolation[]
     */
    public array $snmpOidThresholdViolations;

    /**
     * The interfaces on a device.
     * @var \SeanKndy\SonarApi\Resources\DeviceInterfaceMapping[]
     */
    public array $deviceInterfaceMappings;

    /**
     * The child `InventoryItem`s.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $childInventoryItems;

    /**
     * An `InventoryItem` associated with an `AlertingRotation`.
     * @var \SeanKndy\SonarApi\Resources\AlertingRotationInventoryItem[]
     */
    public array $alertingRotationInventoryItems;

    /**
     * A tracked event that has occurred for an `InventoryItem`.
     * @var \SeanKndy\SonarApi\Resources\InventoryItemEvent[]
     */
    public array $inventoryItemEvents;

    /**
     * An `SnmpOverride`.
     */
    public ?SnmpOverride $snmpOverride;

    /**
     * An `InventoryItem` associated with an `AlertingRotation`.
     */
    public ?AlertingRotationInventoryItem $alertingRotationInventoryItem;

    /**
     * An IP address assignment.
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

    /**
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

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