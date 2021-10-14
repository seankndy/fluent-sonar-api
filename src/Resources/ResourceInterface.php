<?php

namespace SeanKndy\SonarApi\Resources;

interface ResourceInterface
{
    /**
     * Return new instance of resource from the JSON response object.
     */
    public static function fromJsonObject(object $jsonObject): self;
}