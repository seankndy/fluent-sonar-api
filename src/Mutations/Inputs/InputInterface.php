<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

interface InputInterface
{
    public function toArray(): array;

    public function typeName(): string;
}