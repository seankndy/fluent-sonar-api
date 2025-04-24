<?php

namespace SeanKndy\SonarApi\Resources;

class VoiceProvider extends BaseResource implements IdentityInterface
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
     * A descriptive name.
     */
    public string $name;

    /**
     * A direct inward dial (DID).
     * @var \SeanKndy\SonarApi\Resources\Did[]
     */
    public array $dids;

    /**
     * A recipe for importing DIDs.
     * @var \SeanKndy\SonarApi\Resources\DidImportRecipe[]
     */
    public array $didImportRecipes;

    /**
     * A voice provider rate.
     * @var \SeanKndy\SonarApi\Resources\VoiceProviderRate[]
     */
    public array $voiceProviderRates;

    /**
     * An import of voice provider rates.
     * @var \SeanKndy\SonarApi\Resources\VoiceProviderRateImport[]
     */
    public array $voiceProviderRateImports;

    /**
     * A recipe for importing voice provider rates.
     * @var \SeanKndy\SonarApi\Resources\VoiceProviderRateImportRecipe[]
     */
    public array $voiceProviderRateImportRecipes;

    /**
     * A call detail record (CDR).
     * @var \SeanKndy\SonarApi\Resources\CallDetailRecord[]
     */
    public array $callDetailRecords;

    /**
     * An import of call detail records (CDRs).
     * @var \SeanKndy\SonarApi\Resources\CallDetailRecordImport[]
     */
    public array $callDetailRecordImports;

    /**
     * A recipe for importing call detail records (CDRs).
     * @var \SeanKndy\SonarApi\Resources\CallDetailRecordImportRecipe[]
     */
    public array $callDetailRecordImportRecipes;

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