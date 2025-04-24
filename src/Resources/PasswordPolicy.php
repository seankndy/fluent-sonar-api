<?php

namespace SeanKndy\SonarApi\Resources;

class PasswordPolicy extends BaseResource implements IdentityInterface
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
     * The minimum length a password must be.
     */
    public int $minimumLength;

    /**
     * A score for the zxcvbn password strength estimation library that this password must match. 0 allows all passwords, 4 requires a very strong password. See https://github.com/dropbox/zxcvbn for details.
     */
    public int $minimumPasswordStrength;

    /**
     * Must a password be alpha-numeric (contain at least one letter and one number) or can it have any combination of characters?
     */
    public bool $requiresAlphaNumeric;

    /**
     * Does a password require at least one special (non alpha-numeric) character?
     */
    public bool $requiresAtLeastOneSpecialCharacter;

    /**
     * Does a password require both upper and lower case characters?
     */
    public bool $requiresUpperAndLowerCaseCharacters;

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