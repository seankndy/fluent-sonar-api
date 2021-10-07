<?php

namespace SeanKndy\SonarApi\Types;

abstract class BaseType implements TypeInterface
{
    public function name()
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    public function __toString()
    {
        return '' . $this->value();
    }
}