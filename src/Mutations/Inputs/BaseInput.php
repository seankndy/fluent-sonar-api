<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use Illuminate\Support\Str;

/**
 * Child classes must define their properties as protected so that BaseInput can control setting the values
 * and determine which properties to send in the mutation.
 *
 */

abstract class BaseInput implements Input
{
    protected array $declared = [];

    public function __construct(array $data = [])
    {
        if ((new \ReflectionClass($this))->getProperties(\ReflectionProperty::IS_PUBLIC)) {
            throw new \RuntimeException(get_class($this) . " has public properties defined and this is not allowed.");
        }

        foreach ($data as $key => $value) {
            $this->setProperty($key, $value);
        }
    }

    public function __set($var, $value): void
    {
        $this->setProperty($var, $value);
    }

    public function setProperty($var, $value): self
    {
        if (!property_exists($this, $var)) {
            throw new \InvalidArgumentException("Property '$var' does not exist on mutation input class " .
                get_class($this));
        }

        $this->$var = $value;

        if (!in_array($var, $this->declared)) {
            $this->declared[] = $var;
        }

        return $this;
    }

    /**
     * Returns the base class name by default, may be overidden.
     */
    public static function typeName(): string
    {
        return (new \ReflectionClass(static::class))->getShortName();
    }

    public function toArray(): array
    {
        $vars = [];
        foreach ($this->declared as $var) {
            $vars[Str::snake($var)] = $this->$var;
        }
        return $vars;
    }
}