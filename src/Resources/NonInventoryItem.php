<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class NonInventoryItem extends BaseResource implements IdentityInterface
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
     * The ID of a GeneralLedgerCode.
     */
    public ?int $generalLedgerCodeId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A general ledger code.
     */
    public ?GeneralLedgerCode $generalLedgerCode;

    /**
     * An item that can be purchased from a particular vendor.
     * @var \SeanKndy\SonarApi\Resources\VendorItem[]
     */
    public array $vendorItems;

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