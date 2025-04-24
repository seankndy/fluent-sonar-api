<?php

namespace SeanKndy\SonarApi\Resources;

class CustomLinksAllowedVariables extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * A descriptive name.
     */
    public string $name;

}