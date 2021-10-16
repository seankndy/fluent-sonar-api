<?php

namespace SeanKndy\SonarApi\Resources;

class InventoryModelCategory extends BaseResource
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
     * The ID of a GeneralLedgerCode.
     */
    public ?int $generalLedgerCodeId;

    /**
     * An icon.
     */
    public string $icon;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A general ledger code.
     */
    public ?GeneralLedgerCode $generalLedgerCode;

    /**
     * A type of item stored in inventory.
     * @var \SeanKndy\SonarApi\Resources\InventoryModel[]
     */
    public array $inventoryModels;

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