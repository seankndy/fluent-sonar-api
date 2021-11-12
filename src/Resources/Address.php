<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class Address extends BaseResource implements IdentityInterface
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
     * The ID of the entity that owns this address.
     */
    public ?int $addressableId;

    /**
     * The type of entity that owns this address.
     */
    public ?string $addressableType;

    /**
     * Avalara PCode.
     */
    public ?string $avalaraPcode;

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
     * The type.
     */
    public string $type;

    /**
     * A ZIP or postal code.
     */
    public ?string $zip;

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
     * A TowerCoverage submission.
     */
    public ?TowercoverageSubmission $towercoverageSubmission;

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