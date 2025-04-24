<?php

namespace SeanKndy\SonarApi\Resources;

class CalixCloudSetting extends BaseResource implements IdentityInterface
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
     * The Auth0 client ID.
     */
    public string $clientId;

    /**
     * The Auth0 client secret.
     */
    public string $clientSecret;

    /**
     * The ID of the company that this entity operates under.
     */
    public ?int $companyId;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The date and time this device was last synchronized.
     */
    public ?\DateTime $lastSynchronized;

    /**
     * An array of Calix service group definitions.
     */
    public ?string $serviceGroupTiers;

    /**
     * The ID of a `CustomField` that will map to Calix subscriber field1.
     */
    public ?int $subscriberField1Id;

    /**
     * The ID of a `CustomField` that will map to Calix subscriber field2.
     */
    public ?int $subscriberField2Id;

    /**
     * The ID of a `CustomField` that will map to Calix subscriber field3.
     */
    public ?int $subscriberField3Id;

    /**
     * The ID of a `CustomField` that will map to Calix subscriber field4.
     */
    public ?int $subscriberField4Id;

    /**
     * The ID of a `CustomField` that will map to Calix subscriber field5.
     */
    public ?int $subscriberField5Id;

    /**
     * The area type to be used for the location.
     */
    public ?string $subscriberLocation;

    /**
     * The area type to be used for the region.
     */
    public ?string $subscriberRegion;

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
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * A user defined field.
     */
    public ?CustomField $customField;

    /**
     * A Calix Cloud audit record.
     * @var \SeanKndy\SonarApi\Resources\CalixCloudAudit[]
     */
    public array $calixCloudAudits;

    /**
     * An entity which maps an inventory model field to a vendor specific integration field type (ie serial number)
     * @var \SeanKndy\SonarApi\Resources\IntegrationFieldMapping[]
     */
    public array $integrationFieldMappings;

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