<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class TaxTransaction extends BaseResource implements IdentityInterface
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
     * A human readable description.
     */
    public string $description;

    /**
     * The ID of an `TaxProvider`.
     */
    public ?int $taxProviderId;

    /**
     * The ID of entity this tax definition is related to.
     */
    public ?int $taxdefinitionableId;

    /**
     * The type of entity this tax definition is related to.
     */
    public ?string $taxdefinitionableType;

    /**
     * The ID of the entity this tax transaction is related to.
     */
    public int $taxtransactionableId;

    /**
     * The type of entity this tax transaction is related to.
     */
    public string $taxtransactionableType;

    /**
     * A tax provider.
     */
    public ?TaxProvider $taxProvider;

    /**
     * A fractional tax transaction, stored to accurately calculate multi month billing.
     * @var \SeanKndy\SonarApi\Resources\FractionalTaxTransaction[]
     */
    public array $fractionalTaxTransactions;

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