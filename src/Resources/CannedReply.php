<?php

namespace SeanKndy\SonarApi\Resources;

class CannedReply extends BaseResource
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
     * The body.
     */
    public string $body;

    /**
     * The ID of a `CannedReplyCategory`.
     */
    public int $cannedReplyCategoryId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A canned reply category.
     */
    public ?CannedReplyCategory $cannedReplyCategory;

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