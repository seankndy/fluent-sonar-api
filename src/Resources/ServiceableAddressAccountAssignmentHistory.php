<?php

namespace SeanKndy\SonarApi\Resources;

class ServiceableAddressAccountAssignmentHistory extends BaseResource
{
    /**
     * The ID of the entity.
     */
    public int $id;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The ID of the address.
     */
    public int $addressId;

    /**
     * The date that this ends.
     */
    public ?string $endDate;

    /**
     * The start date for this `ScheduleAvailability`.
     */
    public string $startDate;

    /**
     * A customer account.
     */
    public ?Account $account;

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