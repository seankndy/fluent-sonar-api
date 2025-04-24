<?php

namespace SeanKndy\SonarApi\Resources;

class Dispute extends BaseResource implements IdentityInterface
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
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $amount;

    /**
     * The dispute's case ID.
     */
    public ?string $caseId;

    /**
     * The current dispute cycle.
     */
    public ?string $cycle;

    /**
     * The date the dispute was issued.
     */
    public string $disputeDate;

    /**
     * The payment processor's external ID.
     */
    public string $externalId;

    /**
     * The ID of a `Payment`.
     */
    public int $paymentId;

    /**
     * The reason.
     */
    public ?string $reason;

    /**
     * The date the dispute must be replied to by.
     */
    public ?string $replyByDate;

    /**
     * The status.
     */
    public string $status;

    /**
     * A payment.
     */
    public ?Payment $payment;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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