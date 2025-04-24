<?php

namespace SeanKndy\SonarApi\Resources;

class Address extends BaseResource implements IdentityInterface
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
     * Address status ID.
     */
    public ?int $addressStatusId;

    /**
     * The ID of the entity that owns this address.
     */
    public ?int $addressableId;

    /**
     * The type of entity that owns this address.
     */
    public ?string $addressableType;

    /**
     * The address ID for the Anchor address
     */
    public ?int $anchorAddressId;

    /**
     * The attainable download speed in kilobits per second.
     */
    public ?int $attainableDownloadSpeed;

    /**
     * The attainable upload speed in kilobits per second.
     */
    public ?int $attainableUploadSpeed;

    /**
     * Avalara PCode.
     */
    public ?string $avalaraPcode;

    /**
     * The ID of a BillingDefault.
     */
    public ?int $billingDefaultId;

    /**
     * The year used for calculating fips and census tract information.
     */
    public ?int $censusYear;

    /**
     * A city.
     */
    public ?string $city;

    /**
     * A two character country code.
     */
    public ?string $country;

    /**
     * A US county. Only used for US addresses.
     */
    public ?string $county;

    /**
     * Only used in the USA, this is the census tract information used for calculating things like FCC Form 477.
     */
    public ?string $fips;

    /**
     * Identifies the source used to obtain the FIPS code
     */
    public ?string $fipsSource;

    /**
     * Whether or not this address is an anchor
     */
    public bool $isAnchor;

    /**
     * A decimal latitude.
     */
    public ?string $latitude;

    /**
     * Address line 1.
     */
    public ?string $line1;

    /**
     * Address line 2.
     */
    public ?string $line2;

    /**
     * A decimal longitude.
     */
    public ?string $longitude;

    /**
     * Whether or not the address is serviceable, and can be used for new accounts.
     */
    public bool $serviceable;

    /**
     * A state, province, or other country subdivision.
     */
    public ?string $subdivision;

    /**
     * The timezone you want times in the system displayed in.
     */
    public ?string $timezone;

    /**
     * The type.
     */
    public string $type;

    /**
     * A ZIP or postal code.
     */
    public ?string $zip;

    /**
     * The serviceable address that is a anchor of this linked account.
     */
    public ?Address $anchorAddress;

    /**
     * An address status.
     */
    public ?AddressStatus $addressStatus;

    /**
     * Default billing settings that are applied to some accounts on creation.
     */
    public ?BillingDefault $billingDefault;

    /**
     * An inventory item.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $inventoryItems;

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
     * Data entered into a `CustomField`.
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

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
     * A list of linked addresses that this address is a anchor for.
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $linkedAddresses;

    /**
     * A `ServiceableAddressAccountAssignmentHistory` for accounts and addresses.
     * @var \SeanKndy\SonarApi\Resources\ServiceableAddressAccountAssignmentHistory[]
     */
    public array $serviceableAddressAccountAssignmentHistories;

    /**
     * The `Account` disconnections log.
     * @var \SeanKndy\SonarApi\Resources\DisconnectionLog[]
     */
    public array $disconnectionLogs;

    /**
     * An expected change of serviceable address account assignment.
     * @var \SeanKndy\SonarApi\Resources\ServiceableAddressAccountAssignmentFuture[]
     */
    public array $serviceableAddressAccountAssignmentFutures;

    /**
     * A TowerCoverage submission.
     */
    public ?TowercoverageSubmission $towercoverageSubmission;

    /**
     * Network site serviceable address list.
     * @var \SeanKndy\SonarApi\Resources\NetworkSiteServiceableAddressList[]
     */
    public array $networkSiteServiceableAddressLists;

    public function __toString(): string
    {
        $string = (string)$this->line1 . ', ';
        if ($this->line2) {
            $string .= $this->line2 . ', ';
        }
        $string .= (string)$this->city . ', ' . (string)$this->subdivision . ' ' . (string)$this->zip;

        return $string;
    }
}