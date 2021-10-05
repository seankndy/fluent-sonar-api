<?php

namespace SeanKndy\SonarApi\Types;

abstract class Type
{
    /**
     * @var mixed
     */
    protected $value;

    public function name()
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    public function __get(string $var)
    {
        if ($var !== 'value') {
            throw new \RuntimeException("'$var' is an invalid property on a Type class, only 'value' allowed.");
        }

        return $this->value;
    }

    public function __toString()
    {
        return '' . $this->value;
    }
}