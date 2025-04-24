<?php

namespace SeanKndy\SonarApi\Resources;

class AccountAdtranMosaicServiceDetail extends BaseResource implements IdentityInterface
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
    public int $accountServiceId;

    /**
     * The ID of an Adtran Mosaic setting.
     */
    public int $adtranMosaicSettingId;

    /**
     * The name of the Adtran Mosaic downlink inner tag vlan.
     */
    public ?string $downlinkInnerTagVlan;

    /**
     * The name of the Adtran Mosaic downlink interface.
     */
    public ?string $downlinkInterfaceName;

    /**
     * The name of the Adtran Mosaic downlink outer tag vlan.
     */
    public ?string $downlinkOuterTagVlan;

    /**
     * The name of the Adtran Mosaic content provider.
     */
    public ?string $uplinkContentProviderName;

    /**
     * The name of the Adtran Mosaic uplink inner tag vlan.
     */
    public ?string $uplinkInnerTagVlan;

    /**
     * The name of the Adtran Mosaic uplink outer tag vlan.
     */
    public ?string $uplinkOuterTagVlan;

    /**
     * The relationship between an `Account` and a `Service`.
     */
    public ?AccountService $accountService;

    /**
     * An Adtran Mosaic settings record.
     */
    public ?AdtranMosaicSetting $adtranMosaicSetting;

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