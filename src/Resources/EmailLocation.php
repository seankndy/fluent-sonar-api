<?php

namespace SeanKndy\SonarApi\Resources;

class EmailLocation extends BaseResource
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
    public string $city;

    /**
     * A two character country code.
     */
    public string $country;

    /**
     * A decimal latitude.
     */
    public string $latitude;

    /**
     * A decimal longitude.
     */
    public string $longitude;

    /**
     * The zip code of an email location sent by a Mandrill event.
     */
    public string $postalCode;

    /**
     * The timezone you want times in the system displayed in.
     */
    public string $timezone;

    /**
     * A single open for a sent email.
     * @var \SeanKndy\SonarApi\Resources\EmailOpen[]
     */
    public array $emailOpens;

    /**
     * A single click for a sent email.
     * @var \SeanKndy\SonarApi\Resources\EmailClick[]
     */
    public array $emailClicks;

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