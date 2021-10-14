<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasLogs;
use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class AccessLog extends BaseResource
{
    use HasNotes, HasLogs;

    public int $id;

    public \DateTime $accessDatetime;

    public ?int $accessloggableId;

    public ?string $accessloggableType;

    public ?int $entityId;

    public ?string $entityName;

    public int $userId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public User $user;
}