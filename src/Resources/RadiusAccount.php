<?php

namespace SeanKndy\SonarApi\Resources;

class RadiusAccount extends BaseResource
{
    public int $id;

    public int $accountId;

    public string $username;

    public string $password;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}