<?php

namespace SeanKndy\SonarApi\Resources;

class VoiceServiceGenericParameterTaxDefinition extends BaseResource implements IdentityInterface
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
     * Whether this tax definition is for a discount or not.
     */
    public bool $discount;

    /**
     * The ID of entity this tax definition is related to.
     */
    public int $taxdefinitionableId;

    /**
     * The type of entity this tax definition is related to.
     */
    public string $taxdefinitionableType;

    /**
     * The ID of a voice service configuration parameter.
     */
    public int $voiceServiceGenericParameterId;

    /**
     * A configurable attribute for a voice service.
     */
    public ?VoiceServiceGenericParameter $voiceServiceGenericParameter;

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