<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasAddresses;

class TowercoverageSubmission extends BaseResource
{
    use HasAddresses;

    /**
     * The ID of the entity.
     */
    public int $id;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * An email address.
     */
    public ?string $emailAddress;

    /**
     * The full name.
     */
    public ?string $fullName;

    /**
     * The message.
     */
    public string $message;

    /**
     * A note about this TowerCoverage submission.
     */
    public ?string $note;

    /**
     * A telephone number.
     */
    public ?string $phoneNumber;

    /**
     * The raw XML.
     */
    public string $rawXml;

    /**
     * The time that the TowerCoverage submission was received.
     */
    public \DateTime $receivedAt;

    /**
     * The ID of the serviceable address to use for this account.
     */
    public ?int $serviceableAddressId;

    /**
     * Will be true if the operation succeeded.
     */
    public bool $success;

    /**
     * The serviceable address.
     */
    public ?Address $serviceableAddress;

    /**
     * A geographical address.
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $addresses;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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
