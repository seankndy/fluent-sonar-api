<?php

namespace SeanKndy\SonarApi\Tests\Dummy;

use SeanKndy\SonarApi\Resources\ResourceInterface;

class DummyResource implements ResourceInterface
{
    public string $name;

    public function with(): array
    {
        return [];
    }

    public static function fromJsonObject(object $jsonObject): ResourceInterface
    {
        return new self(['name' => '']);
    }
}