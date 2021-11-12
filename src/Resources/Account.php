<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasAddresses;
use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class Account extends BaseResource implements IdentityInterface
{
    use HasAddresses;
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
     * The ID of an AccountStatus.
     */
    public int $accountStatusId;

    /**
     * The ID of an AccountType.
     */
    public int $accountTypeId;

    /**
     * The date an account was first activated.
     */
    public ?string $activationDate;

    /**
     * The time an account was first activated.
     */
    public ?string $activationTime;

    /**
     * The ID of the company that this entity operates under.
     */
    public int $companyId;

    /**
     * The percentage of the data usage cap that this account has consumed this month, taking into account any data usage top offs.
     */
    public ?int $dataUsagePercentage;

    /**
     * A geo-point.
     */
    public ?string $geopoint;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The next date this service will bill. If this is null, it will bill on the next account billing date.
     */
    public ?string $nextBillDate;

    /**
     * The next recurring charge amount for an account. This is the sum of data, expiring, recurring, and voice services of an account for this billing cycle, including tax.
     */
    public ?int $nextRecurringChargeAmount;

    /**
     * The ID of the `Account` that is this `Account`s master.
     */
    public ?int $parentAccountId;

    /**
     * Parameters that define the billing settings for an `Account`.
     */
    public ?AccountBillingParameter $accountBillingParameter;

    /**
     * The status of an account.
     */
    public ?AccountStatus $accountStatus;

    /**
     * The account type.
     */
    public ?AccountType $accountType;

    /**
     * The `Account` that is a parent of this `Account`.
     */
    public ?Account $parentAccount;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * A geographical address.
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $addresses;

    /**
     * A contact person.
     * @var \SeanKndy\SonarApi\Resources\Contact[]
     */
    public array $contacts;

    /**
     * An IP address assignment.
     * @var \SeanKndy\SonarApi\Resources\IpAssignment[]
     */
    public array $ipAssignments;

    /**
     * A historical record of an IP assignment.
     * @var \SeanKndy\SonarApi\Resources\IpAssignmentHistory[]
     */
    public array $ipAssignmentHistories;

    /**
     * A ticket.
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

    /**
     * A job, typically in the field.
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

    /**
     * Data entered into a `CustomField`.
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

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
     * An account group.
     * @var \SeanKndy\SonarApi\Resources\AccountGroup[]
     */
    public array $accountGroups;

    /**
     * A geographical tax zone.
     * @var \SeanKndy\SonarApi\Resources\GeoTaxZone[]
     */
    public array $geoTaxZones;

    /**
     * The data cap `TriggeredEmails` sent to this `Account` for the current billing cycle.
     * @var \SeanKndy\SonarApi\Resources\TriggeredEmail[]
     */
    public array $usageTriggeredEmails;

    /**
     * A credit card.
     * @var \SeanKndy\SonarApi\Resources\CreditCard[]
     */
    public array $creditCards;

    /**
     * A payment.
     * @var \SeanKndy\SonarApi\Resources\Payment[]
     */
    public array $payments;

    /**
     * A debit.
     * @var \SeanKndy\SonarApi\Resources\Debit[]
     */
    public array $debits;

    /**
     * A discount.
     * @var \SeanKndy\SonarApi\Resources\Discount[]
     */
    public array $discounts;

    /**
     * An invoice.
     * @var \SeanKndy\SonarApi\Resources\Invoice[]
     */
    public array $invoices;

    /**
     * The application of a `Discount` or `Payment` against an `Invoice`.
     * @var \SeanKndy\SonarApi\Resources\Credit[]
     */
    public array $credits;

    /**
     * The relationship between an `Account` and a `Service`.
     * @var \SeanKndy\SonarApi\Resources\AccountService[]
     */
    public array $accountServices;

    /**
     * A list of `Account`s that this `Account` is a parent of.
     * @var \SeanKndy\SonarApi\Resources\Account[]
     */
    public array $childAccounts;

    /**
     * A bank account.
     * @var \SeanKndy\SonarApi\Resources\BankAccount[]
     */
    public array $bankAccounts;

    /**
     * A RADIUS account.
     * @var \SeanKndy\SonarApi\Resources\RadiusAccount[]
     */
    public array $radiusAccounts;

    /**
     * A MAC address that is not recorded in the inventory system.
     * @var \SeanKndy\SonarApi\Resources\UninventoriedMacAddress[]
     */
    public array $uninventoriedMacAddresses;

    /**
     * An `Account` event that is run at a specific time.
     * @var \SeanKndy\SonarApi\Resources\ScheduledEvent[]
     */
    public array $scheduledEvents;

    /**
     * A contract.
     * @var \SeanKndy\SonarApi\Resources\Contract[]
     */
    public array $contracts;

    /**
     * A record of a monthly billing cycle.
     * @var \SeanKndy\SonarApi\Resources\MonthlyBillingCompletion[]
     */
    public array $monthlyBillingCompletions;

    /**
     * An override to the default taxation rate.
     * @var \SeanKndy\SonarApi\Resources\TaxOverride[]
     */
    public array $taxOverrides;

    /**
     * A tax exemption.
     * @var \SeanKndy\SonarApi\Resources\TaxExemption[]
     */
    public array $taxExemptions;

    /**
     * A call log.
     * @var \SeanKndy\SonarApi\Resources\CallLog[]
     */
    public array $callLogs;

    /**
     * The `Account` disconnections log.
     * @var \SeanKndy\SonarApi\Resources\DisconnectionLog[]
     */
    public array $disconnectionLogs;

    /**
     * A `ServiceableAddressAccountAssignmentHistory` for accounts and addresses.
     * @var \SeanKndy\SonarApi\Resources\ServiceableAddressAccountAssignmentHistory[]
     */
    public array $serviceableAddressAccountAssignmentHistories;

    /**
     * A data usage history entry.
     * @var \SeanKndy\SonarApi\Resources\DataUsageHistory[]
     */
    public array $dataUsageHistories;

    /**
     * A data usage top off.
     * @var \SeanKndy\SonarApi\Resources\DataUsageTopOff[]
     */
    public array $dataUsageTopOffs;

    /**
     * A direct inward dial (DID) assignment.
     * @var \SeanKndy\SonarApi\Resources\DidAssignment[]
     */
    public array $didAssignments;

    /**
     * A historical record of a direct inward dial (DID) assignment.
     * @var \SeanKndy\SonarApi\Resources\DidAssignmentHistory[]
     */
    public array $didAssignmentHistories;

    /**
     * A call data record (CDR).
     * @var \SeanKndy\SonarApi\Resources\CallDataRecord[]
     */
    public array $callDataRecords;

    /**
     * A tracked event that has occurred for an `Account`.
     * @var \SeanKndy\SonarApi\Resources\AccountEvent[]
     */
    public array $accountEvents;


    /**
     * @codeCoverageIgnore
     */
    public function __toString(): string
    {
        return $this->name .
            (($physAddr = $this->physicalAddress())
                ? " - " . (string)$physAddr
                : ''
            );
    }

}
