<?php

namespace SeanKndy\SonarApi\Resources;

class IdentityProvider extends BaseResource implements IdentityInterface
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
     * The Auth0 connection ID.
     */
    public ?string $auth0ConnectionId;

    /**
     * Name of connection in Auth0.
     */
    public ?string $auth0ConnectionName;

    /**
     * The display name.
     */
    public string $displayName;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The type.
     */
    public string $type;

    /**
     * Details regarding an ActiveDirectory `IdentityProvider`.
     */
    public ?IdentityProviderActiveDirectoryDetail $identityProviderActiveDirectoryDetail;

    /**
     * Details regarding a Google `IdentityProvider`.
     */
    public ?IdentityProviderGoogleDetail $identityProviderGoogleDetail;

    /**
     * Details regarding a Microsoft `IdentityProvider`.
     */
    public ?IdentityProviderMicrosoftDetail $identityProviderMicrosoftDetail;

    /**
     * Details regarding a SAML `IdentityProvider`.
     */
    public ?IdentityProviderSamlDetail $identityProviderSamlDetail;

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