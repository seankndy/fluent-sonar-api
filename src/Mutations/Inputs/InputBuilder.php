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
        $data = [];
        foreach ($this->data as $var => $value) {
            if ($value instanceof \Closure) {
                $data[$var] = $value(new self)->build();
            } else {
                $data[$var] = $value;
            }
        }

        return new Input($this->type, $data);
    }
}