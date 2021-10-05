<?php

namespace SeanKndy\SonarApi\Resources;

class Note extends BaseResource
{
    public int $id;

    public string $message;

    public int $noteableId;

    public string $noteableType;

    public string $priority;

    public int $userId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?User $user;
}