<?php

namespace SeanKndy\SonarApi\Resources;

class DidAssignmentHistory extends BaseResource
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
     * The date and time of assignment.
     */
    public \DateTime $assignedDatetime;

    /**
     * The ID of a `DidAssignment`.
     */
    public ?int $didAssignmentId;

    /**
     * The ID of a `Did`.
     */
    public int $didId;

    /**
     * The date and time of removal.
     */
    public ?\DateTime $removedDatetime;

    /**
     * The ID of a Service.
     */
    public ?int $serviceId;

    /**
     * A direct inward dial (DID) assignment.
     */
    public ?DidAssignment $didAssignment;

    /**
     * A direct inward dial (DID).
     */
    public ?Did $did;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A service.
     */
    public ?Service $service;

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