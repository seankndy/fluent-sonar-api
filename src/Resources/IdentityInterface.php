<?php

namespace SeanKndy\SonarApi\Resources;

interface IdentityInterface
{
    /**
     * Identifier for the resource.
     */
    public function id(): int;
}