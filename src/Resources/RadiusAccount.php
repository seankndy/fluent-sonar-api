<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIpAssignments;
use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class RadiusAccount extends BaseResource
{
    use HasIpAssignments, HasNotes;

    public int $id;

    public int $accountId;

    public string $username;

    public string $password;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?Account $account;
}