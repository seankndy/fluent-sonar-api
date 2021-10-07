<?php

namespace SeanKndy\SonarApi\Types;

class Datetime extends BaseType
{
    private \DateTime $value;

    public function __construct(string $value)
    {
        $this->value = new \DateTime($value);
    }

    public function value(): string
    {
        return $this->value->format(\DateTimeInterface::ISO8601);
    }
}