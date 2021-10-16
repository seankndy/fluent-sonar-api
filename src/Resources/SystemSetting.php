<?php

namespace SeanKndy\SonarApi\Resources;

class SystemSetting extends BaseResource
{
    /**
     * The ID of the entity.
     */
    public int $id;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Application firewall enabled.
     */
    public bool $applicationFirewallEnabled;

    /**
     * Invoices will be created in both English and French for all customers.
     */
    public ?bool $bilingualInvoices;

    /**
     * A city.
     */
    public ?string $city;

    /**
     * A two character country code.
     */
    public string $country;

    /**
     * Automatically create a RADIUS account when a new account is created.
     */
    public bool $createRadiusAccountOnAccountCreation;

    /**
     * The currency the system displays money in.
     */
    public string $currency;

    /**
     * Whether all or only primary contacts may access the customer portal.
     */
    public string $customerPortalContactAccess;

    /**
     * The date format to use.
     */
    public string $dateFormat;

    /**
     * The character used to separate decimals in numbers.
     */
    public string $decimalSeparator;

    /**
     * The character used to separate digits in numbers.
     */
    public string $digitSeparator;

    /**
     * The source for the company used to populate the DBA name on the FCC Form 477. Supports one of service, account, or default.
     */
    public string $fccForm477CompanySource;

    /**
     * The starting number for system generated purchase order numbers.
     */
    public int $initialPurchaseOrderNumber;

    /**
     * An ID that uniquely identifies this Sonar instance.
     */
    public int $instanceId;

    /**
     * A supported language.
     */
    public string $language;

    /**
     * A decimal latitude.
     */
    public ?string $latitude;

    /**
     * A decimal longitude.
     */
    public ?string $longitude;

    /**
     * If an invoice is past due, will include red watermark stamp saying "Past Due" in the local language.
     */
    public ?bool $pastDueStampInvoice;

    /**
     * A text prefix to use when automatically creating a new RADIUS account.
     */
    public string $radiusAccountPrefix;

    /**
     * A state, province, or other country subdivision.
     */
    public string $subdivision;

    /**
     * The date and time to suppress inventory item status alerts until.
     */
    public ?\DateTime $suppressAlertsUntilDatetime;

    /**
     * Whether or not a test billing run has been executed for this instance.
     */
    public bool $testBillingRun;

    /**
     * Whether or not the system is in test mode. In test mode, credit card and bank payments cannot be processed, and emails will not be sent.
     */
    public bool $testMode;

    /**
     * The time format to use.
     */
    public string $timeFormat;

    /**
     * The timezone you want times in the system displayed in.
     */
    public string $timezone;

    /**
     * The system of units.
     */
    public string $units;

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