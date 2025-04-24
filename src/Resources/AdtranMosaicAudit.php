<?php

namespace SeanKndy\SonarApi\Resources;

class AdtranMosaicAudit extends BaseResource implements IdentityInterface
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
     * The ID of an AccountService.
     */
    public ?int $accountServiceId;

    /**
     * The Adtran assigned device name.
     */
    public ?string $adtranDeviceName;

    /**
     * The serial number associated with the Adtran device.
     */
    public ?string $adtranDeviceSerialNumber;

    /**
     * The Adtran interface name.
     */
    public ?string $adtranInterfaceName;

    /**
     * The ID of an Adtran Mosaic setting.
     */
    public int $adtranMosaicSettingId;

    /**
     * The Adtran object returned by the API.
     */
    public ?string $adtranObject;

    /**
     * The Adtran service ID.
     */
    public ?string $adtranServiceId;

    /**
     * The interface name associated with the Adtran service.
     */
    public ?string $adtranServiceInterfaceName;

    /**
     * The audit message describing why item included.
     */
    public ?string $auditMessage;

    /**
     * The audit reason code of why item included.
     */
    public ?string $auditReasonCode;

    /**
     * The ID of an `InventoryItem`.
     */
    public ?int $inventoryItemId;

    /**
     * is_visible of the information
     */
    public bool $isVisible;

    /**
     * The relationship between an `Account` and a `Service`.
     */
    public ?AccountService $accountService;

    /**
     * An Adtran Mosaic settings record.
     */
    public ?AdtranMosaicSetting $adtranMosaicSetting;

    /**
     * An inventory item.
     */
    public ?InventoryItem $inventoryItem;

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