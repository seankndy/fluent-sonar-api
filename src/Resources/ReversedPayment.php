<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class ReversedPayment extends BaseResource implements IdentityInterface
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
     * A human readable description.
     */
    public ?string $description;

    /**
     * The ID of a `Payment`.
     */
    public int $paymentId;

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