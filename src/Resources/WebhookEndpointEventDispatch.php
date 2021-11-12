<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class WebhookEndpointEventDispatch extends BaseResource implements IdentityInterface
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
     * The date and time of when this was last attempted to be sent.
     */
    public ?\DateTime $lastAttemptedAt;

    /**
     * The last status of the last send attempt.
     */
    public string $lastStatus;

    /**
     * The request payload of a fired webhook being sent to an endpoint.
     */
    public string $payload;

    /**
     * The date and time of when this was successfully sent.
     */
    public ?\DateTime $sentAt;

    /**
     * Indicates of this is a test or not.
     */
    public bool $test;

    /**
     * The model and event attached to the webhook endpoint
     */
    public int $webhookEndpointEventId;

    /**
     * An event on a model that can fire a webhook
     */
    public ?WebhookEndpointEvent $webhookEndpointEvent;

    /**
     * A send attempt of a dispatched webhook for a model and event.
     * @var \SeanKndy\SonarApi\Resources\WebhookEndpointEventDispatchAttempt[]
     */
    public array $webhookEndpointEventDispatchAttempts;

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