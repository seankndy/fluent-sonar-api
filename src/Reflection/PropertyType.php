<?php

namespace SeanKndy\SonarApi\Reflection;

use SeanKndy\SonarApi\Resources\ResourceInterface;

class PropertyType
{
    private string $type;

    private bool $arrayOf;

    public function __construct(string $type, bool $arrayOf)
    {
        $this->type = $type;
        $this->arrayOf = $arrayOf;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function arrayOf(): bool
    {
        return $this->arrayOf;
    }

    public function isResource()
    {
        return is_a($this->type, ResourceInterface::class, true);
    }
}