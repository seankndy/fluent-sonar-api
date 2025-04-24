<?php

namespace SeanKndy\SonarApi\Resources;

class RefundedPayment extends BaseResource implements IdentityInterface
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
     * A human readable description.
     */
    public ?string $description;

    /**
     * The ID of a `Payment`.
     */
    public int $paymentId;

    /**
     * The unique tracking ID for this payment.
     */
    public ?string $paymentTrackerId;

    /**
     * The response from the payment processor when this payment was submitted.
     */
    public ?string $processorResponseMessage;

    /**
     * The transaction ID from the credit card provider.
     */
    public ?string $transactionId;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * A payment.
     */
    public ?Payment $payment;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A disbursement detail.
     * @var \SeanKndy\SonarApi\Resources\DisbursementDetail[]
     */
    public array $disbursementDetails;

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