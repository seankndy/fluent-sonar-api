<?php

namespace SeanKndy\SonarApi\Resources;

class IdentityProviderMicrosoftDetail extends BaseResource implements IdentityInterface
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
     * The client ID for this identity provider.
     */
    public string $clientId;

    /**
     * The client secret for this identity provider.
     */
    public string $clientSecret;

    /**
     * The ID of an `IdentityProvider`.
     */
    public int $identityProviderId;

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