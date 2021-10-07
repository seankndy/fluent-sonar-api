<?php

namespace SeanKndy\SonarApi\Types;

class Date extends BaseType
{
    private \DateTime $value;

    public function __construct(string $value)
    {
        $this->value = new \DateTime($value);
    }

    public function value(): string
    {
        return $this->value->format('Y-m-d');
    }
}