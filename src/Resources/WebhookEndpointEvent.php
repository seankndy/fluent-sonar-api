<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class WebhookEndpointEvent extends BaseResource implements IdentityInterface
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
     * An event.
     */
    public string $event;

    /**
     * The model.
     */
    public string $model;

    /**
     * The ID of a webhook endpoint.
     */
    public int $webhookEndpointId;

    /**
     * A URL to an endpoint that a webhook can be sent to.
     */
    public ?WebhookEndpoint $webhookEndpoint;

    /**
     * A webhook for a model and event that has been queued to be sent.
     * @var \SeanKndy\SonarApi\Resources\WebhookEndpointEventDispatch[]
     */
    public array $webhookEndpointEventDispatches;

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