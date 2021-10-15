<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

class InputBuilder
{
    private string $type;

    private array $data;

    public function type(string $type): self
    {
        $builder = clone $this;
        $builder->type = $type;

        return $builder;
    }

    public function data(array $data): self
    {
        $builder = clone $this;
        $builder->data = $data;

        return $builder;
    }

    public function build(): Input
    {
        return new DynamicInput($this->type, $this->resolvedData());
    }

    private function resolvedData(): array
    {
        $vars = [];
        foreach ($this->data as $var => $value) {
            if (\is_callable($value)) {
                $vars[$var] = $value(new self)->build();
            } else {
                $vars[$var] = $value;
            }
        }
        return $vars;
    }

}