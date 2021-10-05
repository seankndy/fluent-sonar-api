<?php

namespace SeanKndy\SonarApi\Types;

class Int64Bit extends Type
{
    /**
     * @var int
     */
    public $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }
}