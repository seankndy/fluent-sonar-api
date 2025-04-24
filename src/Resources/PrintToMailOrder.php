<?php

namespace SeanKndy\SonarApi\Resources;

class PrintToMailOrder extends BaseResource implements IdentityInterface
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
     * The last time the order status was checked.
     */
    public \DateTime $lastStatusCheck;

    /**
     * The name of the print to mail order.
     */
    public string $name;

    /**
     * The print to mail batch ID.
     */
    public int $printToMailBatchId;

    /**
     * The provider ID.
     */
    public string $providerOrderId;

    /**
     * The current status of the print to mail order.
     */
    public string $status;

    /**
     * An error associated with the print to mail order.
     * @var \SeanKndy\SonarApi\Resources\PrintToMailOrderError[]
     */
    public array $printToMailOrderErrors;

    /**
     * A batch of invoices to mail and print.
     */
    public ?PrintToMailBatch $printToMailBatch;

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