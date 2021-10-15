<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use Illuminate\Support\Str;
use SeanKndy\SonarApi\Types\TypeInterface;

class DynamicInput implements Input
{
    private string $type;

    private array $data;

    public function __construct(string $type, array $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    public function toArray(): array
    {
        $vars = [];
        foreach ($this->data as $var => $value) {
            $vars[Str::snake($var)] = $this->resolveValue($value);
        }
        return $vars;
    }

    public function typeName(): string
    {
        return $this->type;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    private function resolveValue($value)
    {
        if ($value instanceof Input) {
            return $value->toArray();
        }

        if ($value instanceof TypeInterface) {
            return $value->value();
        }

        if (\is_array($value)) {
            return \array_map(fn($v) => $this->resolveValue($v), $value);
        }

        return $value;
    }
}