<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class TowercoverageConfiguration extends BaseResource implements IdentityInterface
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
     * The ID of an AccountStatus.
     */
    public ?int $accountStatusId;

    /**
     * The ID of an AccountType.
     */
    public ?int $accountTypeId;

    /**
     * An API key.
     */
    public ?string $apiKey;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The ID of the PhoneNumberType associated with this phone number.
     */
    public ?int $phoneNumberTypeId;

    /**
     * The account type.
     */
    public ?AccountType $accountType;

    /**
     * The status of an account.
     */
    public ?AccountStatus $accountStatus;

    /**
     * A phone number type (e.g. mobile, home, work.)
     */
    public ?PhoneNumberType $phoneNumberType;

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