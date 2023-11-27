<?php

namespace SeanKndy\SonarApi\Resources;

use Illuminate\Support\Collection;

interface ResourceInterface
{
    /**
     * Return new instance or instances (as Collection) of resource from the JSON response object.
     */
    public static function fromJsonObject(object $jsonObject): self;
}