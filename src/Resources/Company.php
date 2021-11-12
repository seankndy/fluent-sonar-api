<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

use SeanKndy\SonarApi\Resources\Traits\HasAddresses;

class Company extends BaseResource implements IdentityInterface
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
     * On an enabled remittance slip, who should checks be made payable to?
     */
    public ?string $checksPayableTo;

    /**
     * A two character country code.
     */
    public string $country;

    /**
     * The URL to your customer portal.
     */
    public ?string $customerPortalUrl;

    /**
     * Whether or not this entity is a default entry.
     */
    public bool $default;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The ISP type of this `Company`.
     */
    public ?string $ispType;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A telephone number.
     */
    public ?string $phoneNumber;

    /**
     * The primary color to use in Sonar.
     */
    public string $primaryColor;

    /**
     * The secondary color to use in Sonar.
     */
    public string $secondaryColor;

    /**
     * Whether or not to include a detachable remittance slip on the invoice.
     */
    public bool $showRemittanceSlip;

    /**
     * A tax identification number. Should only be entered if you are required to share some type of tax identification information with your customers.
     */
    public ?string $taxIdentification;

    /**
     * The address of the company website.
     */
    public ?string $websiteAddress;

    /**
     * A payment.
     * @var \SeanKndy\SonarApi\Resources\Payment[]
     */
    public array $payments;

    /**
     * A customer account.
     * @var \SeanKndy\SonarApi\Resources\Account[]
     */
    public array $accounts;

    /**
     * A debit.
     * @var \SeanKndy\SonarApi\Resources\Debit[]
     */
    public array $debits;

    /**
     * An invoice.
     * @var \SeanKndy\SonarApi\Resources\Invoice[]
     */
    public array $invoices;

    /**
     * A service.
     * @var \SeanKndy\SonarApi\Resources\Service[]
     */
    public array $services;

    /**
     * A contract template.
     * @var \SeanKndy\SonarApi\Resources\ContractTemplate[]
     */
    public array $contractTemplates;

    /**
     * The type of a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobType[]
     */
    public array $jobTypes;

    /**
     * A discount.
     * @var \SeanKndy\SonarApi\Resources\Discount[]
     */
    public array $discounts;

    /**
     * A geographical address.
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $addresses;

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
     * A user defined field.
     * @var \SeanKndy\SonarApi\Resources\CustomField[]
     */
    public array $customFields;

}
