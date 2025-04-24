<?php

namespace SeanKndy\SonarApi\Resources;

class AuthenticationFactor extends BaseResource implements IdentityInterface
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
     * The configuration data of the authentication factor.
     */
    public ?string $data;

    /**
     * Whether or not the authentication factor is verified.
     */
    public bool $isVerified;

    /**
     * The secret configuration data of the authentication factor.
     */
    public ?string $secretData;

    /**
     * The type of authentication factor this is.
     */
    public string $type;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

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