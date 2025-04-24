<?php

namespace SeanKndy\SonarApi\Resources;

class AuthProvider extends BaseResource implements IdentityInterface
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
     * The Auth0 client ID.
     */
    public ?string $auth0ClientId;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The type.
     */
    public string $type;

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