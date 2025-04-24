<?php

namespace SeanKndy\SonarApi\Resources;

class Vehicle extends BaseResource implements IdentityInterface
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
     * A geo-point.
     */
    public ?string $geopoint;

    /**
     * Whether or not to always track the vehicle.
     */
    public bool $gpsTrackingAlways;

    /**
     * If not always, then track on Friday.
     */
    public bool $gpsTrackingDayFriday;

    /**
     * If not always, then track on Monday.
     */
    public bool $gpsTrackingDayMonday;

    /**
     * If not always, then track on Saturday.
     */
    public bool $gpsTrackingDaySaturday;

    /**
     * If not always, then track on Sunday.
     */
    public bool $gpsTrackingDaySunday;

    /**
     * If not always, then track on Thursday.
     */
    public bool $gpsTrackingDayThursday;

    /**
     * If not always, then track on Tuesday.
     */
    public bool $gpsTrackingDayTuesday;

    /**
     * If not always, then track on Wednesday.
     */
    public bool $gpsTrackingDayWednesday;

    /**
     * Whether or not GPS Tracking enabled for vehicle.
     */
    public bool $gpsTrackingEnabled;

    /**
     * If not always, end time for tracking.
     */
    public string $gpsTrackingEndTime;

    /**
     * A `GpsTrackingProvider` ID.
     */
    public ?int $gpsTrackingProviderId;

    /**
     * If not always, start time for tracking.
     */
    public string $gpsTrackingStartTime;

    /**
     * If not always, timezone for start and end times.
     */
    public ?string $gpsTrackingTimezone;

    /**
     * A GPS Tracking Provider vehicle unique identifier.
     */
    public ?string $gpsTrackingUid;

    /**
     * The manufacturer.
     */
    public ?string $manufacturer;

    /**
     * The model.
     */
    public ?string $model;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The vehicle identification number.
     */
    public ?string $vin;

    /**
     * A year.
     */
    public ?int $year;

    /**
     * A `GpsTrackingProvider`.
     */
    public ?GpsTrackingProvider $gpsTrackingProvider;

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

    /**
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

    /**
     * A history of where the vehicle has travelled.
     * @var \SeanKndy\SonarApi\Resources\VehicleLocationHistory[]
     */
    public array $vehicleLocationHistories;

}