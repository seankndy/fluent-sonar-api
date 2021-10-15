<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

interface Input
{
    public function toArray(): array;

    public function typeName(): string;
}