<?php

namespace SeanKndy\SonarApi\Resources;

class AdtranMosaicWorkflowEvent extends BaseResource implements IdentityInterface
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
     * The ID of an Adtran Mosaic setting.
     */
    public int $adtranMosaicSettingId;

    /**
     * The completion status of the event.
     */
    public ?string $completionStatus;

    /**
     * The complete event object of the event.
     */
    public string $eventObject;

    /**
     * The status of the event.
     */
    public ?string $status;

    /**
     * The timestamp of the event.
     */
    public ?\DateTime $timestamp;

    /**
     * The transaction ID of the event.
     */
    public ?string $transId;

    /**
     * An Adtran Mosaic settings record.
     */
    public ?AdtranMosaicSetting $adtranMosaicSetting;

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