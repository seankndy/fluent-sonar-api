<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class DhcpServerCredential extends BaseResource implements IdentityInterface
{
    use HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * A credential for a `DhcpServer`.
     */
    public string $credential;

    /**
     * The ID of a `DhcpServer`.
     */
    public int $dhcpServerId;

    /**
     * The value of a credential for a `DhcpServer`.
     */
    public string $value;

    /**
     * A DHCP server.
     */
    public ?DhcpServer $dhcpServer;

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