<?php

namespace SeanKndy\SonarApi\Types;

/**
 * @codeCoverageIgnore
 */
class Longitude extends BaseType
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}