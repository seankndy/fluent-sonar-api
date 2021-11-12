<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class CallLog extends BaseResource implements IdentityInterface
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The body.
     */
    public string $body;

    /**
     * The subject.
     */
    public string $subject;

    /**
     * The time in seconds.
     */
    public string $timeInSeconds;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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