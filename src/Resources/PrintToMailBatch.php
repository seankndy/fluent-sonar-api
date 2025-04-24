<?php

namespace SeanKndy\SonarApi\Resources;

class PrintToMailBatch extends BaseResource implements IdentityInterface
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
     * How the invoices for the batch were generated.
     */
    public string $batchType;

    /**
     * The completion date of the billing run if the batch type is 'BILLING_RUN'.
     */
    public ?string $billingCompletionDate;

    /**
     * The cost associated with the print to mail batch.
     */
    public int $cost;

    /**
     * The print method for the print to mail batch.
     */
    public string $printMethod;

    /**
     * The print type for the print to mail batch.
     */
    public string $printType;

    /**
     * The current status of the print to mail batch.
     */
    public string $status;

    /**
     * The print to mail order.
     * @var \SeanKndy\SonarApi\Resources\PrintToMailOrder[]
     */
    public array $printToMailOrders;

    /**
     * An invoice.
     * @var \SeanKndy\SonarApi\Resources\Invoice[]
     */
    public array $invoices;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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