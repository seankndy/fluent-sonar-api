<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AchBatch extends BaseResource implements IdentityInterface
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
     * The batch ID that gets inserted into the ACH file on generation.
     */
    public int $achSequence;

    /**
     * The provider to use when transacting against bank accounts.
     */
    public string $format;

    /**
     * This batch includes payments after this date.
     */
    public \DateTime $paymentsAfter;

    /**
     * This batch includes payments before this date.
     */
    public \DateTime $paymentsBefore;

    /**
     * Whether this is a batch of debits or credits.
     */
    public string $type;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

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