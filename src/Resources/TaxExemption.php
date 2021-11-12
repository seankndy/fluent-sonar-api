<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class TaxExemption extends BaseResource implements IdentityInterface
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
     * The jurisdictions of this `TaxExemption`.
     * @var string[]
     */
    public ?array $jurisdictions;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The ID of an `TaxProvider`.
     */
    public int $taxProviderId;

    /**
     * A tax provider.
     */
    public ?TaxProvider $taxProvider;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A tax category defined by Avalara.
     * @var \SeanKndy\SonarApi\Resources\AvalaraTaxCategory[]
     */
    public array $avalaraTaxCategories;

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