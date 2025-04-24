<?php

namespace SeanKndy\SonarApi\Resources;

class VoiceServiceGenericParameter extends BaseResource implements IdentityInterface
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
     * If this service was prorated when added, this is the date it was prorated from.
     */
    public ?string $additionProrateDate;

    /**
     * A human readable description.
     */
    public string $description;

    /**
     * The price per unit of this item.
     */
    public int $price;

    /**
     * Indicates if changes to this entity trigger proration.
     */
    public bool $proratable;

    /**
     * The ID of a tax definition on a reversed transaction.
     */
    public ?int $reverseTaxDefinitionId;

    /**
     * The ID of a tax definition on a transaction.
     */
    public ?int $taxDefinitionId;

    /**
     * The type.
     */
    public string $type;

    /**
     * The ID of the `VoiceServiceDetail`.
     */
    public int $voiceServiceDetailId;

    /**
     * Details regarding a specific voice `Service`.
     */
    public ?VoiceServiceDetail $voiceServiceDetail;

    /**
     * A voice service configuration that links a service parameter to an account.
     * @var \SeanKndy\SonarApi\Resources\AccountVoiceServiceDetail[]
     */
    public array $accountVoiceServiceDetails;

    /**
     * The `AccountVoiceServiceDetail` records used to configure a voice service when a `ScheduledEvent` is executed.
     * @var \SeanKndy\SonarApi\Resources\ScheduledEventAccountVoiceServiceDetail[]
     */
    public array $scheduledEventAccountVoiceServiceDetails;

    /**
     * The `TaxDefinition` pair associated to this entity.
     * @var \SeanKndy\SonarApi\Resources\VoiceServiceGenericParameterTaxDefinition[]
     */
    public array $taxDefinitions;

    /**
     * The relationship between a `VoiceServiceGenericParameter` and a `Tax`.
     * @var \SeanKndy\SonarApi\Resources\VoiceServiceGenericParameterTax[]
     */
    public array $voiceServiceGenericParameterTaxes;

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