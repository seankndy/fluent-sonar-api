<?php

namespace SeanKndy\SonarApi\Resources;

class DisbursementDetail extends BaseResource implements IdentityInterface
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
     * The amount used.
     */
    public int $amountUsed;

    /**
     * The id of the entity that the disbusement applies to.
     */
    public ?int $disbursableId;

    /**
     * The type of entity that the disbursement applies to.
     */
    public ?string $disbursableType;

    /**
     * The ID of a `Disbursement`.
     */
    public int $disbursementId;

    /**
     * The event associated with the disbursement detail record.
     */
    public string $event;

    /**
     * The payment processor's external ID.
     */
    public string $externalId;

    /**
     * The amount for this fee.
     */
    public ?int $feeAmount;

    /**
     * The unit of measurement for this fee's amount.
     */
    public ?string $feeUnit;

    /**
     * The fractional portion of the amount.
     */
    public int $fractionalAmount;

    /**
     * The fractional portion of the amount used.
     */
    public int $fractionalAmountUsed;

    /**
     * The portion of the interchange fee that is a fixed amount. This is stored as the smallest currency value (e.g. cents, pence, pesos.).
     */
    public ?int $interchangeFlatRateFee;

    /**
     * The portion of the interchange fee that is based on a percentage of the transaction amount. This is stored as basis points (e.g. 260 represents 2.6%).
     */
    public ?int $interchangePercentFee;

    /**
     * The name of the interchange fee type.
     */
    public ?string $interchangeType;

    /**
     * Whether or not this record is a fee.
     */
    public bool $isFee;

    /**
     * The transaction ID from the credit card provider.
     */
    public ?string $transactionId;

    /**
     * A disbursement.
     */
    public ?Disbursement $disbursement;

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