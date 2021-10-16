<?php

namespace SeanKndy\SonarApi\Resources;

class DriveTimeResultWrapper extends BaseResource
{
    /**
     * The results of the drive time lookup.
     * @var \SeanKndy\SonarApi\Resources\DriveTimeResult[]
     */
    public array $results;

    /**
     * The number of lookups that were loaded from the cache.
     */
    public int $cachedLookups;

}