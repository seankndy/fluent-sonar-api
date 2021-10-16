<?php

namespace SeanKndy\SonarApi\Resources;

class DateTimeRange extends BaseResource
{
    /**
     * The date and time that this starts.
     */
    public ?\DateTime $startDatetime;

    /**
     * The date and time that this ends.
     */
    public ?\DateTime $endDatetime;

}