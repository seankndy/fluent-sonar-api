<?php

namespace SeanKndy\SonarApi\Resources;

class AccountStatus extends BaseResource
{
    public int $id;

    public string $name;

    public bool $activatesAccount;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}