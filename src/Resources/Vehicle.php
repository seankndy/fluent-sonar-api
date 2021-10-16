<?php

namespace SeanKndy\SonarApi\Resources;

class Vehicle extends BaseResource
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
     * A geo-point.
     */
    public ?string $geopoint;

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