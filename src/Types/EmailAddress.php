<?php

namespace SeanKndy\SonarApi\Types;

class EmailAddress extends BaseType
{
    private string $value;

    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("'$value' is not a valid email address.");
        }

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}