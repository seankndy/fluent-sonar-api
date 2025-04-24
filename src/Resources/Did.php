<?php

namespace SeanKndy\SonarApi\Resources;

class Did extends BaseResource implements IdentityInterface
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
     * The number.
     */
    public string $number;

    /**
     * The ID of a `RateCenter`.
     */
    public ?int $rateCenterId;

    /**
     * The ID of a `VoiceProvider`.
     */
    public int $voiceProviderId;

    /**
     * A `VoiceProvider`.
     */
    public ?VoiceProvider $voiceProvider;

    /**
     * A rate center.
     */
    public ?RateCenter $rateCenter;

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