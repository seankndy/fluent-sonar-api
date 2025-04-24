<?php

namespace SeanKndy\SonarApi\Resources;

class InvoiceTemplateVersion extends BaseResource implements IdentityInterface
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
     * The ID of an Invoice Template.
     */
    public ?int $invoiceTemplateId;

    /**
     * The content of an Invoice Template which includes a remittance slip.
     */
    public string $withRemittance;

    /**
     * The content of an Invoice Template which does not include a remittance slip.
     */
    public string $withoutRemittance;

    /**
     * A template for generating invoices.
     */
    public ?InvoiceTemplate $invoiceTemplate;

    /**
     * An invoice.
     * @var \SeanKndy\SonarApi\Resources\Invoice[]
     */
    public array $invoices;

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