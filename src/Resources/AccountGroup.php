<?php

namespace SeanKndy\SonarApi\Resources;

class AccountGroup extends BaseResource
{
    public int $id;

    public string $name;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}