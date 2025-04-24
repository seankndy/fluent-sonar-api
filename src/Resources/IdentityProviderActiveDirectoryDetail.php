<?php

namespace SeanKndy\SonarApi\Resources;

class IdentityProviderActiveDirectoryDetail extends BaseResource implements IdentityInterface
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
     * Whether to use client SSL certificate authentication or not.
     */
    public bool $certAuth;

    /**
     * Whether to disable the cache or not.
     */
    public bool $disableCache;

    /**
     * The list of domains that can be authenticated.
     * @var string[]
     */
    public ?array $domainAliases;

    /**
     * The ActiveDirectory icon URL.
     */
    public ?string $iconUrl;

    /**
     * The ID of an `IdentityProvider`.
     */
    public int $identityProviderId;

    /**
     * The range of IPs with which to use Windows Integrated Auth (Kerberos).
     * @var string[]
     */
    public ?array $ips;

    /**
     * Whether to use Windows Integrated Auth (Kerberos) or not.
     */
    public bool $kerberos;

    /**
     * The ActiveDirectory provisioning ticket URL.
     */
    public ?string $ticketUrl;

    /**
     * An identity provider.
     */
    public ?IdentityProvider $identityProvider;

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