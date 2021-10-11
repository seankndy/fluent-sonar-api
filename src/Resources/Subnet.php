<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIpAssignments;
use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class Subnet extends BaseResource
{
    use HasIpAssignments, HasNotes;

    public int $id;

    public ?int $largestCidrAvailable;

    public string $name;

    public ?int $pollerId;

    public int $pollingPriority;

    public string $subnet;

    public ?int $supernetId;

    public string $type;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?Supernet $supernet;

    /**
     * @var \SeanKndy\SonarApi\Resources\IpPool[]
     */
    public array $ipPools;
}