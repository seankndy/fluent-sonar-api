<?php

namespace SeanKndy\SonarApi\Resources;

class IpAssignment extends BaseResource
{
    public int $id;

    public ?int $ipPoolId;

    public int $ipassignmentableId;

    public string $ipassignmentableType;

    public ?string $description;

    public ?string $reference;

    public bool $soft;

    public string $subnet;

    public int $subnetId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}