<?php

namespace SeanKndy\SonarApi\Resources;

class Contact extends BaseResource implements IdentityInterface
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
     * The ID of the entity that owns this contact.
     */
    public int $contactableId;

    /**
     * The type of entity that owns this contact.
     */
    public string $contactableType;

    /**
     * An email address.
     */
    public ?string $emailAddress;

    /**
     * A supported language.
     */
    public ?string $language;

    /**
     * Whether or not marketing messages accepted.
     */
    public ?bool $marketingOptIn;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Whether or not this is the primary type of entity.
     */
    public bool $primary;

    /**
     * The role of the contact, e.g. "CEO" or "Network Engineer".
     */
    public ?string $role;

    /**
     * A username, used for authentication.
     */
    public ?string $username;

    /**
     * A phone number.
     * @var \SeanKndy\SonarApi\Resources\PhoneNumber[]
     */
    public array $phoneNumbers;

    /**
     * A contract.
     * @var \SeanKndy\SonarApi\Resources\Contract[]
     */
    public array $contracts;

    /**
     * A categorization of a message by type.
     * @var \SeanKndy\SonarApi\Resources\MessageCategory[]
     */
    public array $messageCategories;

    /**
     * A categorization of an `Email` by type.
     * @var \SeanKndy\SonarApi\Resources\EmailCategory[]
     */
    public array $emailCategories;

    /**
     * A mass email communication.
     * @var \SeanKndy\SonarApi\Resources\MassEmail[]
     */
    public array $massEmails;

    /**
     * An email.
     * @var \SeanKndy\SonarApi\Resources\Email[]
     */
    public array $emails;

    /**
     * An SMS outbound message.
     * @var \SeanKndy\SonarApi\Resources\SmsOutboundMessage[]
     */
    public array $smsOutboundMessages;

    /**
     * Data entered into a `CustomField`.
     * @var \SeanKndy\SonarApi\Resources\CustomFieldData[]
     */
    public array $customFieldData;

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