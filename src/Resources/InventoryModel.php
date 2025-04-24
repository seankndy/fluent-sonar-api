<?php

namespace SeanKndy\SonarApi\Resources;

class InventoryModel extends BaseResource implements IdentityInterface
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
     * Sets the default vendor to be used for purchasing this inventory model.
     */
    public ?int $defaultVendorId;

    /**
     * The type of inventory model.
     */
    public string $deviceType;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Whether or not this is generic.
     */
    public bool $generic;

    /**
     * An icon.
     */
    public string $icon;

    /**
     * The ID of an InventoryModelCategory.
     */
    public int $inventoryModelCategoryId;

    /**
     * Whether or not inventory item can be broken down into segments.
     */
    public bool $isSegmentable;

    /**
     * If this is a SIM card for LTE provisioning, which provider this SIM is for.
     */
    public ?string $lteSimType;

    /**
     * The ID of a Manufacturer.
     */
    public int $manufacturerId;

    /**
     * The actual model name/part number.
     */
    public ?string $modelName;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of a `NetworkMonitoringTemplate`.
     */
    public ?int $networkMonitoringTemplateId;

    /**
     * The TCP port that the web interface of this type of device is available on.
     */
    public ?int $port;

    /**
     * The protocol used to access the web interface.
     */
    public ?string $protocol;

    /**
     * The quantity of this inventory model.
     */
    public ?int $quantity;

    /**
     * The unit of measurement for this inventory model.
     */
    public ?string $unitOfMeasurement;

    /**
     * A manufacturer of an item stored in inventory.
     */
    public ?Manufacturer $manufacturer;

    /**
     * A category of item stored in inventory.
     */
    public ?InventoryModelCategory $inventoryModelCategory;

    /**
     * A `NetworkMonitoringTemplate`.
     */
    public ?NetworkMonitoringTemplate $networkMonitoringTemplate;

    /**
     * The default vendor that should be used for restocking this inventory model.
     */
    public ?Vendor $defaultVendor;

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
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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
     * An Adtran Mosaic audit record.
     * @var \SeanKndy\SonarApi\Resources\AdtranMosaicAudit[]
     */
    public array $adtranMosaicAudits;

    /**
     * A field on an inventory model.
     * @var \SeanKndy\SonarApi\Resources\InventoryModelField[]
     */
    public array $inventoryModelFields;

    /**
     * An inventory item.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $inventoryItems;

    /**
     * The mode that an inventory item is deployed in.
     * @var \SeanKndy\SonarApi\Resources\DeploymentType[]
     */
    public array $deploymentTypes;

    /**
     * A generic inventory item.
     * @var \SeanKndy\SonarApi\Resources\GenericInventoryItem[]
     */
    public array $genericInventoryItems;

    /**
     * A log of an action taken against a set of generic inventory items.
     * @var \SeanKndy\SonarApi\Resources\GenericInventoryItemActionLog[]
     */
    public array $genericInventoryItemActionLogs;

    /**
     * An entity which maps an inventory model field to a vendor specific integration field type (ie serial number)
     * @var \SeanKndy\SonarApi\Resources\IntegrationFieldMapping[]
     */
    public array $integrationFieldMappings;

    /**
     * Defines the minimum and maximum of an inventory level for all locations per inventory model.
     * @var \SeanKndy\SonarApi\Resources\GlobalInventoryModelMinMax[]
     */
    public array $globalInventoryModelMinMaxes;

    /**
     * Defines the minimum and maximum of an inventory level per location per inventory model.
     * @var \SeanKndy\SonarApi\Resources\InventoryModelMinMax[]
     */
    public array $inventoryModelMinMaxes;

    /**
     * An alerting rotation.
     * @var \SeanKndy\SonarApi\Resources\AlertingRotation[]
     */
    public array $alertingRotations;

}