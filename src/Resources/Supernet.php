<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class Supernet extends BaseResource
{
    use HasNotes;

    public int $id;

    public ?int $largestCidrAvailable;

    public string $name;

    public string $subnet;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    /**
     * @var \SeanKndy\SonarApi\Resources\Subnet[]
     */
    public array $subnets;
}