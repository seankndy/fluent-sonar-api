<?php

namespace SeanKndy\SonarApi\Resources;

class User extends BaseResource
{
    public int $id;

    public string $name;

    public string $username;

    public string $emailAddress;

    public bool $enabled;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}

