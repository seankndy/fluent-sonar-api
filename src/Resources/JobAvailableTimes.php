<?php

namespace SeanKndy\SonarApi\Resources;

class JobAvailableTimes extends BaseResource
{
    /**
     * A list of `DateTimeRange`s which indicate the available times.
     * @var \SeanKndy\SonarApi\Resources\DateTimeRange[]
     */
    public ?array $availableTimes;

    /**
     * IDs of `User`s.
     * @var int[]
     */
    public ?array $userIds;

}