<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use Illuminate\Support\Str;
use SeanKndy\SonarApi\Reflection\Reflection;
use SeanKndy\SonarApi\Types\TypeInterface;

/**
 * Child classes must define their properties as protected so that BaseInput can control setting the values
 * and determine which properties to send in the mutation.
 *
 */

abstract class BaseInput implements Input
{
    protected array $declared = [];

    protected array $propertiesAndTypes;

    public function __construct(array $data = [])
    {
        if ((new \ReflectionClass($this))->getProperties(\ReflectionProperty::IS_PUBLIC)) {
            throw new \RuntimeException(get_class($this) . " has public properties defined and this is not allowed.");
        }

        $this->propertiesAndTypes = Reflection::getPropertiesAndTypes(
            $this,
            \ReflectionProperty::IS_PROTECTED
        );

        foreach ($data as $key => $value) {
            $this->setProperty($key, $value);
        }
    }

    /**
     * @param mixed $value
     */
    public function __set(string $var, $value): void
    {
        $this->setProperty($var, $value);
    }

    /**
     * @param mixed $value
     */
    public function setProperty(string $var, $value): self
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
            $vars[Str::snake($var)] = $this->resolveValue($var);
        }
        return $vars;
    }

    /**
     * @return mixed
     */
    private function resolveValue(string $var)
    {
        $type = $this->propertiesAndTypes[$var]->type();
        $arrayOf = $this->propertiesAndTypes[$var]->arrayOf();

        if (is_a($type, Input::class, true)) {
            if ($arrayOf) {
                return \array_map(fn(Input $v): array => $v->toArray(), $this->$var);
            }
            return $this->$var->toArray();
        }

        if (is_a($type, TypeInterface::class, true)) {
            if ($arrayOf) {
                /** @psalm-suppress MissingClosureReturnType */
                return \array_map(fn(TypeInterface $v) => $v->value(), $this->$var);
            }
            return $this->$var->value();
        }

        return $this->$var;
    }
}