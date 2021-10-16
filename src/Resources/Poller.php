<?php

namespace SeanKndy\SonarApi\Resources;

class Poller extends BaseResource
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
     * An API key.
     */
    public string $apiKey;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The amount of time it took to poll ICMP status.
     */
    public ?int $icmpTimeTaken;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * When the results were last received.
     */
    public ?\DateTime $resultsLastReceived;

    /**
     * The amount of time it took to poll SNMP status.
     */
    public ?int $snmpTimeTaken;

    /**
     * The UTC timestamp for the last time accounts were polled.
     */
    public ?\DateTime $timeOfLastAccountPoll;

    /**
     * The UTC timestamp for the last time infrastructure was polled.
     */
    public ?\DateTime $timeOfLastInfrastructurePoll;

    /**
     * Version.
     */
    public ?string $version;

    /**
     * An IPv4/IPv6 subnet.
     * @var \SeanKndy\SonarApi\Resources\Subnet[]
     */
    public array $subnets;

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