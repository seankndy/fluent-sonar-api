<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIpAssignments;
use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class IpPool extends BaseResource
{
    use HasNotes, HasIpAssignments;

    public int $id;

    public ?int $dhcpServerIdentifierId;

    public string $ipRange;

    public int $ipsAvailable;

    public string $name;

    public int $subnetId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?Subnet $subnet;
}