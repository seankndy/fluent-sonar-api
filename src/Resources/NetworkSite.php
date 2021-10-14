<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasAddresses;
use SeanKndy\SonarApi\Resources\Traits\HasCustomFieldData;
use SeanKndy\SonarApi\Types\Geopoint;

class NetworkSite extends BaseResource
{
    use HasAddresses, HasCustomFieldData;

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
}