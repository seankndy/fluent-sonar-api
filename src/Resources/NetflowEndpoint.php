<?php

namespace SeanKndy\SonarApi\Resources;

class NetflowEndpoint extends BaseResource implements IdentityInterface
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
     * Hostname.
     */
    public string $hostname;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A TCP port.
     */
    public string $port;

    /**
     * Whitelist mode.
     */
    public bool $whitelistMode;

    /**
     * A subnet allowed to send data to a Netflow endpoint.
     * @var \SeanKndy\SonarApi\Resources\NetflowAllowedSubnet[]
     */
    public array $netflowAllowedSubnets;

    /**
     * A whitelisted subnet for a Netflow endpoint.
     * @var \SeanKndy\SonarApi\Resources\NetflowWhitelist[]
     */
    public array $netflowWhitelists;

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