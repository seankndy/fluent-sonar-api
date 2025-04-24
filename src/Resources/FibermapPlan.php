<?php

namespace SeanKndy\SonarApi\Resources;

class FibermapPlan extends BaseResource implements IdentityInterface
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
     * Build
     */
    public ?string $build;

    /**
     * A two character country code.
     */
    public ?string $country;

    /**
     * Drop
     */
    public ?string $drop;

    /**
     * FiberMap integration ID
     */
    public int $fibermapIntegrationId;

    /**
     * FiberMap plan ID
     */
    public int $fibermapPlanId;

    /**
     * Fibermap project ID.
     */
    public int $fibermapProjectId;

    /**
     * Fibermap project name.
     */
    public string $fibermapProjectName;

    /**
     * FiberMap updated at
     */
    public ?\DateTime $fibermapUpdatedAt;

    /**
     * Height in meters.
     */
    public int $heightInMeters;

    /**
     * is_visible of the information
     */
    public bool $isVisible;

    /**
     * A decimal latitude.
     */
    public ?string $latitude;

    /**
     * A decimal longitude.
     */
    public ?string $longitude;

    /**
     * The ID of a map overlay.
     */
    public ?int $mapOverlayId;

    /**
     * Mapped at
     */
    public ?\DateTime $mappedAt;

    /**
     * Mapping user
     */
    public ?string $mappingUser;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Network site id.
     */
    public ?int $networkSiteId;

    /**
     * A state, province, or other country subdivision.
     */
    public ?string $subdivision;

    /**
     * FiberMap integration.
     */
    public ?FibermapIntegration $fibermapIntegration;

    /**
     * A network site.
     */
    public ?NetworkSite $networkSite;

    /**
     * Map Overlay.
     */
    public ?MapOverlay $mapOverlay;

    /**
     * FiberMap service location.
     * @var \SeanKndy\SonarApi\Resources\FibermapServiceLocation[]
     */
    public array $fibermapServiceLocations;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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