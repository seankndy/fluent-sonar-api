<?php

namespace SeanKndy\SonarApi\Resources;

class RadiusSessionHistory extends BaseResource
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
     * Account session ID.
     */
    public string $accountSessionId;

    /**
     * Called station ID.
     */
    public ?string $calledStationId;

    /**
     * Calling station ID.
     */
    public ?string $callingStationId;

    /**
     * The time that a disconnect was requested.
     */
    public ?\DateTime $disconnectRequested;

    /**
     * The end.
     */
    public ?\DateTime $end;

    /**
     * An IPv4/IPv6 address.
     */
    public ?string $ipAddress;

    /**
     * The IP address of the NAS.
     */
    public ?string $nasIpAddress;

    /**
     * The ID of a `RadiusAccount`.
     */
    public int $radiusAccountId;

    /**
     * The real session ID.
     */
    public ?string $realSessionId;

    /**
     * The start.
     */
    public \DateTime $start;

    /**
     * The reason for the session termination.
     */
    public ?string $terminateReason;

    /**
     * A RADIUS account.
     */
    public ?RadiusAccount $radiusAccount;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

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