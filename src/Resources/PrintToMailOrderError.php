<?php

namespace SeanKndy\SonarApi\Resources;

class PrintToMailOrderError extends BaseResource implements IdentityInterface
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
     * An error message associated with a print to mail order.
     */
    public string $errorMessage;

    /**
     * The error type.
     */
    public string $errorType;

    /**
     * The ID of the invoice that has the error.
     */
    public ?int $invoiceId;

    /**
     * The print to mail order ID.
     */
    public int $printToMailOrderId;

    /**
     * Whether or not the error has been marked as resolved.
     */
    public bool $resolved;

    /**
     * The print to mail order.
     */
    public ?PrintToMailOrder $printToMailOrder;

    /**
     * An invoice.
     */
    public ?Invoice $invoice;

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