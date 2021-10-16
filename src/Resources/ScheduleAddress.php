<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduleAddress extends BaseResource
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
     * A city.
     */
    public ?string $city;

    /**
     * A two character country code.
     */
    public ?string $country;

    /**
     * A decimal latitude.
     */
    public string $latitude;

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
    public string $longitude;

    /**
     * A descriptive name.
     */
    public string $name;

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
     * A user that can login to Sonar.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

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