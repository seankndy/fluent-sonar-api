<?php

namespace SeanKndy\SonarApi\Resources;

class IdentityProviderSamlDetail extends BaseResource implements IdentityInterface
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
     * Authentication domains.
     */
    public string $authDomains;

    /**
     * The X.509 signing certificate contents.
     */
    public string $certificate;

    /**
     * Whether to include more verbose logging during the authentication process or not.
     */
    public bool $debug;

    /**
     * The sign request algorithm digest.
     */
    public string $digestAlgorithm;

    /**
     * The ID of an `IdentityProvider`.
     */
    public int $identityProviderId;

    /**
     * The SAML protocol binding.
     */
    public string $protocolBinding;

    /**
     * The SAML sign in URL.
     */
    public string $signInEndpoint;

    /**
     * The SAML sign out URL.
     */
    public ?string $signOutEndpoint;

    /**
     * Whether to sign the SAML request or not.
     */
    public bool $signSamlRequest;

    /**
     * The sign request algorithm.
     */
    public string $signatureAlgorithm;

    /**
     * The attribute in the SAML token that will be mapped to the user_id property.
     */
    public ?string $userIdAttribute;

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