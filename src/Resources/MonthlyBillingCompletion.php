<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class MonthlyBillingCompletion extends BaseResource implements IdentityInterface
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
     * A date
     */
    public string $date;

    /**
     * The ID of an `Invoice`.
     */
    public int $invoiceId;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * An invoice.
     */
    public ?Invoice $invoice;

    /**
     * A call data record (CDR).
     * @var \SeanKndy\SonarApi\Resources\CallDataRecord[]
     */
    public array $callDataRecords;

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