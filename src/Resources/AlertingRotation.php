<?php

namespace SeanKndy\SonarApi\Resources;

class AlertingRotation extends BaseResource implements IdentityInterface
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
     * Whether to include all account equipment in this rotation.
     */
    public bool $allAccounts;

    /**
     * Whether to include all inventory models in this rotation.
     */
    public bool $allInventoryModels;

    /**
     * Whether to include all network site equipment in this rotation.
     */
    public bool $allNetworkSites;

    /**
     * The number of minutes a device can be in a down state before generating alert.
     */
    public int $downTimeInMinutesBeforeAlerting;

    /**
     * The number of minutes a device can remain in a down state before sending a repeat alert.
     */
    public int $downTimeInMinutesBeforeRepeat;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Whether this repeats forever or not.
     */
    public bool $infiniteRepetitions;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The number of times this repeats.
     */
    public ?int $repetitions;

    /**
     * The start.
     */
    public string $start;

    /**
     * The number of minutes a device can be in a warning state before generating alert.
     */
    public int $warningTimeInMinutesBeforeAlerting;

    /**
     * The number of minutes a device can remain in a warning state before sending a repeat alert.
     */
    public int $warningTimeInMinutesBeforeRepeat;

    /**
     * The number of weeks between repetitions.
     */
    public int $weeksBetweenRepetitions;

    /**
     * An alerting rotation day.
     * @var \SeanKndy\SonarApi\Resources\AlertingRotationDay[]
     */
    public array $alertingRotationDays;

    /**
     * An `InventoryItem` associated with an `AlertingRotation`.
     * @var \SeanKndy\SonarApi\Resources\AlertingRotationInventoryItem[]
     */
    public array $alertingRotationInventoryItems;

    /**
     * An account group.
     * @var \SeanKndy\SonarApi\Resources\AccountGroup[]
     */
    public array $accountGroups;

    /**
     * The account type.
     * @var \SeanKndy\SonarApi\Resources\AccountType[]
     */
    public array $accountTypes;

    /**
     * A type of item stored in inventory.
     * @var \SeanKndy\SonarApi\Resources\InventoryModel[]
     */
    public array $inventoryModels;

    /**
     * A network site.
     * @var \SeanKndy\SonarApi\Resources\NetworkSite[]
     */
    public array $networkSites;

    /**
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

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