<?php

namespace SeanKndy\SonarApi\Types;

interface TypeInterface
{
    /**
     * Return the type's value.
     *
     * @return mixed
     */
    public function value();
}