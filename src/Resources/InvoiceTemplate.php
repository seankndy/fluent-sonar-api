<?php

namespace SeanKndy\SonarApi\Resources;

class InvoiceTemplate extends BaseResource implements IdentityInterface
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * If an item is protected, it cannot be modified or deleted.
     */
    public bool $protected;

    /**
     * The content of an Invoice Template which includes a remittance slip.
     */
    public ?string $withRemittance;

    /**
     * The content of an Invoice Template which does not include a remittance slip.
     */
    public ?string $withoutRemittance;

    /**
     * A version of a template for generating invoices, preserved for historical purposes.
     * @var \SeanKndy\SonarApi\Resources\InvoiceTemplateVersion[]
     */
    public array $invoiceTemplateVersions;

    /**
     * The account type.
     * @var \SeanKndy\SonarApi\Resources\AccountType[]
     */
    public array $accountTypes;

    /**
     * A company you do business as.
     * @var \SeanKndy\SonarApi\Resources\Company[]
     */
    public array $companies;

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