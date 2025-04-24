<?php

namespace SeanKndy\SonarApi\Resources;

class MonthlyBillingCompletion extends BaseResource implements IdentityInterface
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
     * A call detail record (CDR).
     * @var \SeanKndy\SonarApi\Resources\CallDetailRecord[]
     */
    public array $callDetailRecords;

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