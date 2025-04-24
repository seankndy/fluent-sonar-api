<?php

namespace SeanKndy\SonarApi\Resources;

class CalixIntegration extends BaseResource implements IdentityInterface
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
     * Controls if Sonar updates the inventory item's soft IP address from SMx DHCP lease alarms.
     */
    public bool $alarmsUpdateIpAssignment;

    /**
     * Disable, pause, then re-enable Calix ONT ports after creating or removing service.  Recommended for deployments using DHCP within SMx.
     */
    public bool $bouncePorts;

    /**
     * The Calix policy map name to use when a commercial account becomes delinquent.
     */
    public ?string $commercialDelinquencyPolicyMap;

    /**
     * The Calix service template name to use when a commercial account becomes delinquent.
     */
    public ?string $commercialDelinquencyServiceTemplate;

    /**
     * The ID of the company that this entity operates under.
     */
    public ?int $companyId;

    /**
     * Whether or not a default Calix service detail record is created when integration service added.
     */
    public ?bool $createDefaultServiceDetail;

    /**
     * Controls whether to turn on synchronization of Calix ONTs and Subscribers, from Sonar Inventory Items and Accounts.
     */
    public bool $enableOntSynchronization;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The Calix policy map name to use when a government account becomes delinquent.
     */
    public ?string $governmentDelinquencyPolicyMap;

    /**
     * The Calix service template name to use when a government account becomes delinquent.
     */
    public ?string $governmentDelinquencyServiceTemplate;

    /**
     * The Calix policy map name to use when an industrial account becomes delinquent.
     */
    public ?string $industrialDelinquencyPolicyMap;

    /**
     * The Calix service template name to use when an industrial account becomes delinquent.
     */
    public ?string $industrialDelinquencyServiceTemplate;

    /**
     * The date and time this device was last synchronized.
     */
    public ?\DateTime $lastSynchronized;

    /**
     * Subscriber organization ID to use for integration
     */
    public string $orgId;

    /**
     * The Calix policy map name to use when a residential account becomes delinquent.
     */
    public ?string $residentialDelinquencyPolicyMap;

    /**
     * The Calix service template name to use when a residential account becomes delinquent.
     */
    public ?string $residentialDelinquencyServiceTemplate;

    /**
     * The Calix policy map name to use when a senior citizen account becomes delinquent.
     */
    public ?string $seniorCitizenDelinquencyPolicyMap;

    /**
     * The Calix service template name to use when a senior citizen account becomes delinquent.
     */
    public ?string $seniorCitizenDelinquencyServiceTemplate;

    /**
     * The basic auth credentials to use with SMx, username:password
     */
    public string $smxCredentials;

    /**
     * The URL of the SMx server including the SMx API port, eg. mysmx.org:18443 (SMx uses 18443 as the default API port)
     */
    public string $smxUrl;

    /**
     * The software version of SMx that will be used in integration
     */
    public string $smxVersion;

    /**
     * The status.
     */
    public ?string $status;

    /**
     * A message describing what caused the current status of this device.
     */
    public ?string $statusMessage;

    /**
     * The ID of the account custom field which holds the SMx subscriber ID of the account.
     */
    public ?int $subscriberCustomFieldId;

    /**
     * Whether or not a synchronization request is queued.
     */
    public bool $synchronizationQueued;

    /**
     * The date/time that synchronization started.
     */
    public ?\DateTime $synchronizationStart;

    /**
     * A company you do business as.
     */
    public ?Company $company;

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
     * A log entry.
     * @var \SeanKndy\SonarApi\Resources\Log[]
     */
    public array $logs;

    /**
     * An access log history on an entity.
     * @var \SeanKndy\SonarApi\Resources\AccessLog[]
     */
    public array $accessLogs;

    /**
     * Holds information for provisioning service on Calix devices.
     * @var \SeanKndy\SonarApi\Resources\AccountCalixServiceDetail[]
     */
    public array $accountCalixServiceDetails;

    /**
     * The `AccountCalixServiceDetail` records used to configure the Calix integrations when a `ScheduledEvent` is executed.
     * @var \SeanKndy\SonarApi\Resources\ScheduledEventAccountCalixServiceDetail[]
     */
    public array $scheduledEventAccountCalixServiceDetails;

}