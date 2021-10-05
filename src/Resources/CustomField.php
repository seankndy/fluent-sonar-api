<?php

namespace SeanKndy\SonarApi\Resources;

class CustomField extends BaseResource
{
    public int $id;

    public string $entityType;

    public array $enumOptions;

    public string $name;

    public bool $required;

    public string $type;

    public bool $unique;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}