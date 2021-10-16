<?php

namespace SeanKndy\SonarApi\Resources;

class InlineDeviceCredential extends BaseResource
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
     * An individual credential to authenticate to an inline device.
     */
    public string $credential;

    /**
     * The ID of an `InlineDevice`.
     */
    public int $inlineDeviceId;

    /**
     * The credential value (e.g. username, password, etc.)
     */
    public string $value;

    /**
     * A device that sits inline with customer traffic to impose network policy.
     */
    public ?InlineDevice $inlineDevice;

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