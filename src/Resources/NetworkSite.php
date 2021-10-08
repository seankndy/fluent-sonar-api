<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Types\Geopoint;

class NetworkSite extends BaseResource
{
    public int $id;

    public ?Geopoint $geopoint;

    public float $heightInMeters;

    public string $name;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    /**
     * @var \SeanKndy\SonarApi\Resources\Contact[]
     */
    public array $contacts;

    /**
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

    /**
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

    /**
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $addresses;

    /**
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;
}