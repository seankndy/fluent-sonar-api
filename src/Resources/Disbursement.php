<?php

namespace SeanKndy\SonarApi\Resources;

class Disbursement extends BaseResource implements IdentityInterface
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
     * The bank account.
     */
    public ?string $bankAccount;

    /**
     * The ID of a BankProcessor.
     */
    public ?int $bankAccountProcessorId;

    /**
     * The ID of a CreditCardProcessor.
     */
    public ?int $creditCardProcessorId;

    /**
     * The payment processor's external ID.
     */
    public string $externalId;

    /**
     * The date and time this entity was processed.
     */
    public ?\DateTime $processedAt;

    /**
     * The disbursement payout schedule.
     */
    public ?string $schedule;

    /**
     * The amount scheduled for payout.
     */
    public ?int $scheduleAmount;

    /**
     * The disbursement payout scheduling factor.
     */
    public ?int $scheduleFactor;

    /**
     * The unit of measurement for this disbursement's payout amount.
     */
    public ?string $scheduleUnit;

    /**
     * The status.
     */
    public string $status;

    /**
     * A disbursement detail.
     * @var \SeanKndy\SonarApi\Resources\DisbursementDetail[]
     */
    public array $disbursementDetails;

    /**
     * A processor or method of processing bank account payments.
     */
    public ?BankAccountProcessor $bankAccountProcessor;

    /**
     * A company that processes `CreditCard` transactions.
     */
    public ?CreditCardProcessor $creditCardProcessor;

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