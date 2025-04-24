<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduledEventAccountCalixServiceDetail extends BaseResource implements IdentityInterface
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
     * Calix Inegartion ID.
     */
    public int $calixIntegrationId;

    /**
     * Custom JSON.
     */
    public ?string $customJson;

    /**
     * C-VLAN.
     */
    public ?int $cvlan;

    /**
     * Global VLAN.
     */
    public ?string $globalVlan;

    /**
     * ONT Port ID.
     */
    public ?string $ontPortId;

    /**
     * Policy Map.
     */
    public ?string $policyMap;

    /**
     * The ID of a `ScheduledEvent`
     */
    public int $scheduledEventId;

    /**
     * Use Custom JSON.
     */
    public ?bool $useCustomJson;

    /**
     * VLAN.
     */
    public ?int $vlan;

    /**
     * A configuration for a specific Calix SMx endpoint.
     */
    public ?CalixIntegration $calixIntegration;

    /**
     * An `Account` event that is run at a specific time.
     */
    public ?ScheduledEvent $scheduledEvent;

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