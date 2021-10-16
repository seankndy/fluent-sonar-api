<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduleResult extends BaseResource
{
    /**
     * JSON encoded data used for scheduling.
     */
    public string $schedulingData;

    /**
     * A list of `Geofence`s.
     * @var \SeanKndy\SonarApi\Resources\Geofence[]
     */
    public array $geofences;

    /**
     * A list of `JobType`s.
     * @var \SeanKndy\SonarApi\Resources\JobType[]
     */
    public array $jobTypes;

    /**
     * A list of `ScheduleAvailabilityDayTime`s.
     * @var \SeanKndy\SonarApi\Resources\ScheduleAvailabilityDayTime[]
     */
    public array $scheduleAvailabilityDayTimes;

    /**
     * A list of `ScheduleBlockerDayTime`s.
     * @var \SeanKndy\SonarApi\Resources\ScheduleBlockerDayTime[]
     */
    public array $scheduleBlockerDayTimes;

    /**
     * Schedule blocker overrides.
     * @var \SeanKndy\SonarApi\Resources\ScheduleBlockerOverride[]
     */
    public array $scheduleBlockerOverrides;

    /**
     * A list of `ScheduleTimeOff`s.
     * @var \SeanKndy\SonarApi\Resources\ScheduleTimeOff[]
     */
    public array $scheduleTimeOffs;

    /**
     * A list of `User`s.
     * @var \SeanKndy\SonarApi\Resources\User[]
     */
    public array $users;

}