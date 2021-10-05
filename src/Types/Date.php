<?php

namespace SeanKndy\SonarApi\Types;

use Carbon\Carbon;

class Date extends Type
{
    /**
     * @var Carbon
     */
    protected $value;

    public function __construct(string $value)
    {
        $this->value = new Carbon($value);
    }

    public function __get(string $var)
    {
        $value = parent::__get($var);

        return $value->format('Y-m-d');
    }
}