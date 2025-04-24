<?php

namespace SeanKndy\SonarApi\Resources;

class AdtranMosaicSetting extends BaseResource implements IdentityInterface
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
     * Controls if Sonar updates the ICMP device status from SMx alarms
     */
    public bool $alarmsChangeDeviceStatus;

    /**
     * Controls if Sonar should add SMx device alarms to inventory item logs
     */
    public bool $alarmsCreateLogs;

    /**
     * The base API URL.
     */
    public string $apiUrl;

    /**
     * Whether or not to suspend unattached services.
     */
    public bool $autoSuspendUnattachedServices;

    /**
     * Disable, pause, then re-enable Calix ONT ports after creating or removing service.  Recommended for deployments using DHCP within SMx.
     */
    public bool $bouncePorts;

    /**
     * Bounce ports disable profile.
     */
    public string $bouncePortsDisableProfile;

    /**
     * Bounce ports enable profile.
     */
    public string $bouncePortsEnableProfile;

    /**
     * Commercial account type delinquency profile vector.
     */
    public ?string $commercialDelinquencyProfileVector;

    /**
     * Whether or not commercial account type suspends.
     */
    public bool $commercialDelinquencySuspends;

    /**
     * The ID of the company that this entity operates under.
     */
    public ?int $companyId;

    /**
     * The name of the default Adtran Mosaic downlink inner tag vlan.
     */
    public ?string $defaultDownlinkInnerTagVlan;

    /**
     * The name of the default Adtran Mosaic downlink interface.
     */
    public ?string $defaultDownlinkInterfaceName;

    /**
     * The name of the default Adtran Mosaic downlink outer tag vlan.
     */
    public ?string $defaultDownlinkOuterTagVlan;

    /**
     * The name of the default Adtran Mosaic content provider.
     */
    public ?string $defaultUplinkContentProviderName;

    /**
     * The name of the default Adtran Mosaic uplink inner tag vlan.
     */
    public ?string $defaultUplinkInnerTagVlan;

    /**
     * The name of the default Adtran Mosaic uplink outer tag vlan.
     */
    public string $defaultUplinkOuterTagVlan;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Government account type delinquency profile vector.
     */
    public ?string $governmentDelinquencyProfileVector;

    /**
     * Whether or not government account type suspends.
     */
    public bool $governmentDelinquencySuspends;

    /**
     * Industrial account type delinquency profile vector.
     */
    public ?string $industrialDelinquencyProfileVector;

    /**
     * Whether or not industrial account type suspends.
     */
    public bool $industrialDelinquencySuspends;

    /**
     * The date and time this device was last synchronized.
     */
    public ?\DateTime $lastSynchronized;

    /**
     * A password.
     */
    public string $password;

    /**
     * Residential account type delinquency profile vector.
     */
    public ?string $residentialDelinquencyProfileVector;

    /**
     * Whether or not residential account type suspends.
     */
    public bool $residentialDelinquencySuspends;

    /**
     * Senior citizen account type delinquency profile vector.
     */
    public ?string $seniorCitizenDelinquencyProfileVector;

    /**
     * Whether or not senior citizen account type suspends.
     */
    public bool $seniorCitizenDelinquencySuspends;

    /**
     * Whether or not a synchronization audit has been run.
     */
    public bool $synchronizationAuditRan;

    /**
     * Whether or not a synchronization request is queued.
     */
    public bool $synchronizationQueued;

    /**
     * The date/time that synchronization started.
     */
    public ?\DateTime $synchronizationStart;

    /**
     * Status of the synchronization process.
     */
    public string $synchronizationStatus;

    /**
     * Details regarding the current synchronization status if any.
     */
    public ?string $synchronizationStatusMessage;

    /**
     * A username, used for authentication.
     */
    public string $username;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * An account Adtran Mosaic service detail.
     * @var \SeanKndy\SonarApi\Resources\AccountAdtranMosaicServiceDetail[]
     */
    public array $accountAdtranMosaicServiceDetails;

    /**
     * An entity which maps an inventory model field to a vendor specific integration field type (ie serial number)
     * @var \SeanKndy\SonarApi\Resources\IntegrationFieldMapping[]
     */
    public array $integrationFieldMappings;

    /**
     * An entity which maps a service to a vendor specific service name
     * @var \SeanKndy\SonarApi\Resources\IntegrationServiceMapping[]
     */
    public array $integrationServiceMappings;

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