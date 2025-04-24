<?php

namespace SeanKndy\SonarApi\Resources;

class NetflowOnPremise extends BaseResource implements IdentityInterface
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
     * An IPv4/IPv6 address.
     */
    public string $ip;

    /**
     * The file name of the last processed records.
     */
    public ?string $lastProcessedFilename;

    /**
     * The size of the last processed records file.
     */
    public ?int $lastProcessedSize;

    /**
     * The date and time of the last processed records.
     */
    public ?\DateTime $lastProcessedTimestamp;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A JSON object of tracked statistics.
     */
    public ?string $statistics;

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