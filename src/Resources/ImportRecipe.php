<?php

namespace SeanKndy\SonarApi\Resources;

class ImportRecipe extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * The ID of a User.
     */
    public ?int $userId;

    /**
     * The identifier of a unique batch at Flatfile.
     */
    public ?string $flatfileBatchIdentifier;

    /**
     * The unique identifier of an import at Sonar.
     */
    public ?string $sonarBatchIdentifier;

    /**
     * The status.
     */
    public ?string $status;

    /**
     * The progress of an import as a percentage.
     */
    public ?int $progress;

    /**
     * Any errors encountered for this import.
     */
    public ?string $errors;

    /**
     * How many records passed validation checks during import.
     */
    public ?int $cleanRecords;

    /**
     * How many records did not pass validation checks during import.
     */
    public ?int $failedRecords;

    /**
     * A hash of the data content of an import.
     */
    public ?string $hash;

    /**
     * The date and time that this starts.
     */
    public ?\DateTime $startDatetime;

    /**
     * The connection wrapper around the `Import` type.
     * @var \SeanKndy\SonarApi\Resources\Import[]
     */
    public array $imports;

}