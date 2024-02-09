<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class PhoneNumber extends BaseResource implements IdentityInterface
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
     * The ID of the contact that owns this.
     */
    public int $contactId;

    /**
     * A two character country code for this phone number.
     */
    public string $country;

    /**
     * The extension.
     */
    public ?string $extension;

    /**
     * The number.
     */
    public string $number;

    /**
     * A phone number formatted for human readability.
     */
    public ?string $numberFormatted;

    /**
     * The ID of the PhoneNumberType associated with this phone number.
     */
    public int $phoneNumberTypeId;

    /**
     * Whether or not SMS messages accepted.
     */
    public bool $smsOptIn;

    /**
     * A phone number type (e.g. mobile, home, work.)
     */
    public ?PhoneNumberType $phoneNumberType;

    /**
     * A contact person.
     */
    public ?Contact $contact;

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