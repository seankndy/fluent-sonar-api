<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasAddresses;
use SeanKndy\SonarApi\Resources\Traits\HasCustomFieldData;
use SeanKndy\SonarApi\Resources\Traits\HasIpAssignments;
use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class Account extends BaseResource
{
    use HasNotes, HasIpAssignments, HasAddresses, HasCustomFieldData;

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
     * @var \SeanKndy\SonarApi\Resources\Contact[]
     */
    public array $contacts;

    /**
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

    /**
     * @var \SeanKndy\SonarApi\Resources\RadiusAccount[]
     */
    public array $radiusAccounts;

    /**
     * @var \SeanKndy\SonarApi\Resources\BankAccount[]
     */
    public array $bankAccounts;

    /**
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

    /**
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

    public ?AccountBillingParameter $accountBillingParameter;

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