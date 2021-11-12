<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class FractionalTaxTransaction extends BaseResource implements IdentityInterface
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
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $amount;

    /**
     * The amount of this `Debit` that was taxed.
     */
    public int $amountTaxed;

    /**
     * A date
     */
    public string $date;

    /**
     * A human readable description.
     */
    public string $description;

    /**
     * The ID of a `TaxTransactions`.
     */
    public int $taxTransactionId;

    /**
     * A tax transaction.
     */
    public ?TaxTransaction $taxTransaction;

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