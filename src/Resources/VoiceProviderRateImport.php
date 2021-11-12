<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class VoiceProviderRateImport extends BaseResource implements IdentityInterface
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
     * The percentage over the base rate to charge the customer.
     */
    public float $chargePercent;

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
     * The status.
     */
    public string $status;

    /**
     * The ID of a `VoiceProvider`.
     */
    public int $voiceProviderId;

    /**
     * A `VoiceProvider`.
     */
    public ?VoiceProvider $voiceProvider;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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