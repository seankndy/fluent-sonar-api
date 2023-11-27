<?php

namespace SeanKndy\SonarApi\Resources;

use Illuminate\Support\Collection;

interface ResourceInterface
{
    /**
     * Return new instance or instances (as Collection) of resource from the JSON response object.
     * @param array|object $jsonObject
     * @return Collection<static>|static
     */
    public static function fromJsonObject($jsonObject);
}