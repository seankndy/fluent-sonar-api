<?php

namespace SeanKndy\SonarApi\Resources;

class MapOverlay extends BaseResource implements IdentityInterface
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
     * Map Overlay Language (KML) file contents.
     */
    public string $contents;

    /**
     * file type
     */
    public string $fileType;

    /**
     * A decimal latitude.
     */
    public string $latitude;

    /**
     * A decimal longitude.
     */
    public string $longitude;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Network site id.
     */
    public ?int $networkSiteId;

    /**
     * Radius in KM.
     */
    public float $radius;

    /**
     * A network site.
     */
    public ?NetworkSite $networkSite;

    /**
     * FiberMap plan.
     * @var \SeanKndy\SonarApi\Resources\FibermapPlan[]
     */
    public array $fibermapPlans;

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