<?php

namespace SeanKndy\SonarApi\Resources;

class ServiceableAddressAccountAssignmentFuture extends BaseResource implements IdentityInterface
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The ID of the address.
     */
    public int $addressId;

    /**
     * A note about this expected change of serviceable address account assignment.
     */
    public ?string $note;

    /**
     * The date this is targeted to happen.
     */
    public string $targetDate;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A geographical address.
     */
    public ?Address $address;

    /**
     * A job, typically in the field.
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

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