<?php

namespace SeanKndy\SonarApi\Resources;

class LocalPrefix extends BaseResource
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
     * A telephone number prefix.
     */
    public string $prefix;

    /**
     * The ID of the `VoiceServiceDetail`.
     */
    public int $voiceServiceDetailId;

    /**
     * Details regarding a specific voice `Service`.
     */
    public ?VoiceServiceDetail $voiceServiceDetail;

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