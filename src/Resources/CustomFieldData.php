<?php

namespace SeanKndy\SonarApi\Resources;

class CustomFieldData extends BaseResource
{
    public int $id;

    public int $customFieldId;

    public int $customfielddataableId;

    public string $customfielddataableType;

    public ?string $value;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?CustomField $customField;
}