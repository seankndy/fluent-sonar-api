<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class WebhookEndpoint extends BaseResource implements IdentityInterface
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The URL to the remote resource that webhooks will be sent to.
     */
    public string $endpoint;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * An event on a model that can fire a webhook
     * @var \SeanKndy\SonarApi\Resources\WebhookEndpointEvent[]
     */
    public array $webhookEndpointEvents;

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