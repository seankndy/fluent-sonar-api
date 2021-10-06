<?php

namespace SeanKndy\SonarApi\Tests\Dummy;

use SeanKndy\SonarApi\Resources\BaseResource;

class AnotherDummyResource extends BaseResource
{
    public ?string $name;

    /**
     * @var \SeanKndy\SonarApi\Tests\Dummy\AndAnotherDummyResource[]
     */
    public array $andAnotherDummyResources;
}