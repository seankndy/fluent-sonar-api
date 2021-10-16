<?php

namespace SeanKndy\SonarApi\Resources;

class Did extends BaseResource
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
     * A two character country code.
     */
    public string $country;

    /**
     * The number.
     */
    public string $number;

    /**
     * A state, province, or other country subdivision.
     */
    public ?string $subdivision;

    /**
     * The ID of a `VoiceProvider`.
     */
    public int $voiceProviderId;

    /**
     * A `VoiceProvider`.
     */
    public ?VoiceProvider $voiceProvider;

    /**
     * A direct inward dial (DID) assignment.
     * @var \SeanKndy\SonarApi\Resources\DidAssignment[]
     */
    public array $didAssignments;

    /**
     * A historical record of a direct inward dial (DID) assignment.
     * @var \SeanKndy\SonarApi\Resources\DidAssignmentHistory[]
     */
    public array $didAssignmentHistories;

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