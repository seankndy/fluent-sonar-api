<?php

namespace SeanKndy\SonarApi\Resources;

class Contact extends BaseResource
{
    public int $id;

    public int $contactableId;

    public string $contactableType;

    public ?string $name;

    public ?string $username;

    public ?string $emailAddress;

    public ?string $role;

    public bool $primary;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}