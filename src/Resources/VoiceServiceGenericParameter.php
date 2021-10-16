<?php

namespace SeanKndy\SonarApi\Resources;

class VoiceServiceGenericParameter extends BaseResource
{
    /**
     * The ID of the entity.
     */
    public int $id;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * A human readable description.
     */
    public string $description;

    /**
     * The price per unit of this item.
     */
    public int $price;

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
     * The `TaxDefinition` pair associated to this entity.
     * @var \SeanKndy\SonarApi\Resources\VoiceServiceGenericParameterTaxDefinition[]
     */
    public array $taxDefinitions;

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