<?php

namespace SeanKndy\SonarApi\Types;

class Int64Bit extends BaseType
{
    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}