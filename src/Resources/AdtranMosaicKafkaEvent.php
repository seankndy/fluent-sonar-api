<?php

namespace SeanKndy\SonarApi\Resources;

class AdtranMosaicKafkaEvent extends BaseResource implements IdentityInterface
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
     * The Kafka topic to for the event.
     */
    public ?string $kafkaTopic;

    /**
     * Key for a specific value.
     */
    public ?string $key;

    /**
     * The value.
     */
    public ?string $value;

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