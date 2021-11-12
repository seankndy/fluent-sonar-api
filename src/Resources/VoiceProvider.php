<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class VoiceProvider extends BaseResource implements IdentityInterface
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
     * A descriptive name.
     */
    public string $name;

    /**
     * A direct inward dial (DID).
     * @var \SeanKndy\SonarApi\Resources\Did[]
     */
    public array $dids;

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
     * A call data record (CDR).
     * @var \SeanKndy\SonarApi\Resources\CallDataRecord[]
     */
    public array $callDataRecords;

    /**
     * An import of call data records (CDRs).
     * @var \SeanKndy\SonarApi\Resources\CallDataRecordImport[]
     */
    public array $callDataRecordImports;

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