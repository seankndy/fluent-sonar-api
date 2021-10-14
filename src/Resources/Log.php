<?php

namespace SeanKndy\SonarApi\Resources;

class Log extends BaseResource
{
    public int $id;

    public string $current;

    public bool $legacy;

    public string $level;

    public int $loggableId;

    public string $loggableType;

    public int $loggedEntityId;

    public string $loggedEntityType;

    public ?string $message;

    public ?string $previous;

    public ?string $relationData;

    public ?string $type;

    public ?int $userId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}