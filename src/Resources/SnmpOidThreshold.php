<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpOidThreshold extends BaseResource implements IdentityInterface
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
     * An operator.
     */
    public string $operator;

    /**
     * The ID of an `SnmpOid`.
     */
    public int $snmpOidId;

    /**
     * The amount of time in minutes that the threshold must be violated before it is triggered.
     */
    public int $timePeriodInMinutes;

    /**
     * The value.
     */
    public string $value;

    /**
     * An `SnmpOidThresholdViolation`.
     * @var \SeanKndy\SonarApi\Resources\SnmpOidThresholdViolation[]
     */
    public array $snmpOidThresholdViolations;

    /**
     * An `SnmpOid`.
     */
    public ?SnmpOid $snmpOid;

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