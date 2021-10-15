<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use Illuminate\Support\Str;
use SeanKndy\SonarApi\Types\TypeInterface;

class Input implements InputInterface
{
    private string $type;

    private array $data;

    public function __construct(string $type, array $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function toArray(): array
    {
        return $this->deeplyResolveData($this->data);
    }

    public function typeName(): string
    {
        return $this->type;
    }

    private function deeplyResolveData(array $data): array
    {
        $resolved = [];

        foreach ($data as $var => $value) {
            if ($value instanceof InputInterface) {
                $value = $value->toArray();
            } else if ($value instanceof TypeInterface) {
                $value = $value->value();
            } else if (\is_array($value)) {
                $value = $this->deeplyResolveData($value);
            }

            $resolved[\is_int($var) ? $var : Str::snake($var)] = $value;
        }

        return $resolved;
    }
}