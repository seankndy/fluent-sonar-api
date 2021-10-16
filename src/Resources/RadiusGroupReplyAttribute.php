<?php

namespace SeanKndy\SonarApi\Resources;

class RadiusGroupReplyAttribute extends BaseResource
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
     * A descriptive name.
     */
    public string $name;

    /**
     * A RADIUS reply operator.
     */
    public string $operator;

    /**
     * The ID of a `RadiusGroup`.
     */
    public int $radiusGroupId;

    /**
     * A RADIUS reply.
     */
    public string $reply;

    /**
     * A RADIUS group.
     */
    public ?RadiusGroup $radiusGroup;

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