<?php

namespace SeanKndy\SonarApi\Resources;

class Account extends BaseResource
{
    public int $id;

    public string $name;

    public ?AccountStatus $accountStatus;

    public ?AccountType $accountType;

    public ?Company $company;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    /**
     * @var \SeanKndy\SonarApi\Resources\Account[]
     */
    public array $childAccounts;

    /**
     * @var \SeanKndy\SonarApi\Resources\AccountGroup[]
     */
    public array $accountGroups;

    /**
     * @var \SeanKndy\SonarApi\Resources\AccountService[]
     */
    public array $accountServices;

    /**
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $addresses;

    /**
     * @var \SeanKndy\SonarApi\Resources\Contact[]
     */
    public array $contacts;

    /**
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

    /**
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

    /**
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * @var \SeanKndy\SonarApi\Resources\RadiusAccount[]
     */
    public array $radiusAccounts;

    /**
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

    /**
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

    public ?AccountBillingParameter $accountBillingParameter;

    public function physicalAddress(): ?Address
    {
        foreach ($this->addresses as $address) {
            if ($address->type === 'PHYSICAL') {
                return $address;
            }
        }
        return null;
    }

    public function mailingAddress(): ?Address
    {
        foreach ($this->addresses as $address) {
            if ($address->type === 'MAILING') {
                return $address;
            }
        }
        return null;
    }

    /**
     * @codeCoverageIgnore
     */
    public function __toString(): string
    {
        return $this->name .
            (($physAddr = $this->physicalAddress())
                ? " - " . $physAddr->line1 . ', ' . (string)$physAddr->line2 . ', ' .
                    (string)$physAddr->city . ' ' . (string)$physAddr->zip
                : ''
            );
    }
}