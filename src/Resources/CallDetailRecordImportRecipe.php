<?php

namespace SeanKndy\SonarApi\Resources;

class CallDetailRecordImportRecipe extends BaseResource implements IdentityInterface
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
     * How many records passed validation checks during import.
     */
    public ?int $cleanRecords;

    /**
     * Any errors encountered for this import.
     */
    public ?string $errors;

    /**
     * How many records did not pass validation checks during import.
     */
    public ?int $failedRecords;

    /**
     * The identifier of a unique batch at Flatfile.
     */
    public ?string $flatfileBatchIdentifier;

    /**
     * A hash of the data content of an import.
     */
    public ?string $hash;

    /**
     * The progress of an import as a percentage.
     */
    public ?int $progress;

    /**
     * The unique identifier of an import at Sonar.
     */
    public ?string $sonarBatchIdentifier;

    /**
     * The start date and time for the import.
     */
    public ?\DateTime $startDatetime;

    /**
     * The status.
     */
    public string $status;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * The ID of a `VoiceProvider`.
     */
    public int $voiceProviderId;

    /**
     * A `VoiceProvider`.
     */
    public ?VoiceProvider $voiceProvider;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * An import.
     * @var \SeanKndy\SonarApi\Resources\Import[]
     */
    public array $imports;

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