<?php

namespace SeanKndy\SonarApi\Resources;

class AlertingRotationInventoryItem extends BaseResource
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
     * The alerting rotation ID.
     */
    public int $alertingRotationId;

    /**
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * The date and time that this rotation was last notified of a status change.
     */
    public ?\DateTime $lastAlertedDatetime;

    /**
     * The last monitoring status of an inventory item.
     */
    public ?string $lastOverallStatus;

    /**
     * The date and time that the inventory item status last changed.
     */
    public ?\DateTime $lastStatusChangeDatetime;

    /**
     * The next date and time to send a status alert for this rotation.
     */
    public ?\DateTime $nextAlertDatetime;

    /**
     * An alerting rotation.
     */
    public ?AlertingRotation $alertingRotation;

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