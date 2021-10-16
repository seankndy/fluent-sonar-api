<?php

namespace SeanKndy\SonarApi\Resources;

class WebhookEndpointEventDispatchAttempt extends BaseResource
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
     * The message of the SMTP response.
     */
    public ?string $response;

    /**
     * The date and time of when a response was received.
     */
    public ?\DateTime $responseAt;

    /**
     * The HTTP status code of the last response.
     */
    public ?int $responseCode;

    /**
     * The status.
     */
    public string $status;

    /**
     * The ID of a dispatch for a webhook model event.
     */
    public int $webhookEndpointEventDispatchId;

    /**
     * A webhook for a model and event that has been queued to be sent.
     */
    public ?WebhookEndpointEventDispatch $webhookEndpointEventDispatch;

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