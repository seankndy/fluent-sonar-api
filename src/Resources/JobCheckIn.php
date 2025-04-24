<?php

namespace SeanKndy\SonarApi\Resources;

class JobCheckIn extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * The date and time that this `Job` was checked into.
     */
    public \DateTime $checkInDatetime;

    /**
     * The date and time that this `Job` was checked out of.
     */
    public ?\DateTime $checkOutDatetime;

    /**
     * The ID of the `User` that created this check in.
     */
    public int $checkedInByUserId;

    /**
     * The ID of the `User` that updated this check in with a check out date and time.
     */
    public ?int $checkedOutByUserId;

    /**
     * The ID of a `Job`.
     */
    public int $jobId;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A job, typically in the field.
     */
    public ?Job $job;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * The `User` that created a `JobCheckIn`.
     */
    public ?User $checkedInByUser;

    /**
     * The `User` that checked out a `JobCheckIn`.
     */
    public ?User $checkedOutByUser;

    /**
     * A log entry.
     * @var \SeanKndy\SonarApi\Resources\Log[]
     */
    public array $logs;

    /**
     * An access log history on an entity.
     * @var \SeanKndy\SonarApi\Resources\AccessLog[]
     */
    public array $accessLogs;

}