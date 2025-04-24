<?php

namespace SeanKndy\SonarApi\Resources;

class PhoneNumberType extends BaseResource implements IdentityInterface
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
     * A descriptive name.
     */
    public string $name;

    /**
     * Whether or not phone numbers of this type are capable of sending and receiving SMS messages.
     */
    public bool $smsCapable;

    /**
     * A phone number.
     * @var \SeanKndy\SonarApi\Resources\PhoneNumber[]
     */
    public array $phoneNumbers;

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