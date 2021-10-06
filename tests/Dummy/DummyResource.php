<?php

namespace SeanKndy\SonarApi\Tests\Dummy;

use SeanKndy\SonarApi\Resources\BaseResource;

class DummyResource extends BaseResource
{
    public ?int $id;

    public ?string $name;

    public ?\DateTime $someDateTime;

    public ?AnotherDummyResource $anotherDummyResource;
}