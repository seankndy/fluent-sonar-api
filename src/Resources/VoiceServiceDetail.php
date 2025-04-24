<?php

namespace SeanKndy\SonarApi\Resources;

class VoiceServiceDetail extends BaseResource implements IdentityInterface
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
     * How often this service bills, in months.
     */
    public int $billingFrequency;

    /**
     * The cost per minute for local calls, in thousandths of the smallest currency value (e.g. cents, pence, pesos.).
     */
    public ?int $costPerMinuteLocalInThousandths;

    /**
     * The cost per minute for long distance calls, in thousandths of the smallest currency value (e.g. cents, pence, pesos.).
     */
    public ?int $costPerMinuteLongDistanceInThousandths;

    /**
     * A two character country code.
     */
    public ?string $country;

    /**
     * This is the minimum amount of time the customer will be charged for a call.
     */
    public int $firstIntervalInSeconds;

    /**
     * If a customer has a toll free number, this is the rate charged to them for inbound calls, in thousandths of the smallest currency value (e.g. cents, pence, pesos.).
     */
    public int $inboundTollFreeRatePerMinuteInThousandths;

    /**
     * The quantity of free local minutes provided, if `unlimited_local_minutes` is false.
     */
    public ?int $localMinutes;

    /**
     * The quantity of free long distance minutes provided, if `unlimited_long_distance_minutes` is false.
     */
    public ?int $longDistanceMinutes;

    /**
     * Hide parameters of this service on customer invoices/statements and in the customer portal.
     */
    public bool $rollupGenericParameters;

    /**
     * The ID of a Service.
     */
    public int $serviceId;

    /**
     * Indicates if Call Detail Records (CDRs) for this service should be displayed on an invoice.
     */
    public bool $showCallDetailRecordsOnInvoice;

    /**
     * After the `first_interval_in_seconds` time is exceeded, this is the minimum amount of subsequent time. For example, if `first_interval_in_seconds` is 30, and `sub_interval_in_seconds` is 6, then a 31 second call would be charged at 36 seconds, and a 37 second call would be charged at 42 seconds.
     */
    public int $subIntervalInSeconds;

    /**
     * The sub type of this voice service.
     */
    public string $subType;

    /**
     * Whether this service provides unlimited local minutes.
     */
    public bool $unlimitedLocalMinutes;

    /**
     * Whether this service provides unlimited long distance minutes.
     */
    public bool $unlimitedLongDistanceMinutes;

    /**
     * A service.
     */
    public ?Service $service;

    /**
     * A local prefix for a voice service.
     * @var \SeanKndy\SonarApi\Resources\LocalPrefix[]
     */
    public array $localPrefixes;

    /**
     * A configurable attribute for a voice service.
     * @var \SeanKndy\SonarApi\Resources\VoiceServiceGenericParameter[]
     */
    public array $voiceServiceGenericParameters;

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