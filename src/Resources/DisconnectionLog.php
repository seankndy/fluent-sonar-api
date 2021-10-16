<?php

namespace SeanKndy\SonarApi\Resources;

class DisconnectionLog extends BaseResource
{
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The date and time that the account was disconnected.
     */
    public \DateTime $disconnectedAt;

    /**
     * The `User` that disconnected the `Account`.
     */
    public int $disconnectedByUserId;

    /**
     * The ID of the serviceable address to use for this account.
     */
    public ?int $serviceableAddressId;

    /**
     * The deleted address object, as a formatted single line, that was disconnected. Used for historical reporting when address is deleted.
     */
    public ?string $serviceableAddressReferenceRecord;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * The user that disconnected this `Account`.
     */
    public ?User $disconnectedByUser;

    /**
     * The serviceable address.
     */
    public ?Address $serviceableAddress;

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