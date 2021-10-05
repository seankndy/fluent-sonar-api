<?php

namespace SeanKndy\SonarApi\Resources;

class AccountType extends BaseResource
{
    public int $id;

    public string $name;

    public string $color;

    public string $type;

    public string $icon;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}