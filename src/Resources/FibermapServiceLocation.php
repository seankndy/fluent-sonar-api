<?php

namespace SeanKndy\SonarApi\Resources;

class FibermapServiceLocation extends BaseResource implements IdentityInterface
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
     * The ID of the address.
     */
    public ?int $addressId;

    /**
     * Child properties JSON
     */
    public string $childPropertiesJson;

    /**
     * Child Vetro ID
     */
    public ?string $childVetroId;

    /**
     * FiberMap integration ID
     */
    public int $fibermapIntegrationId;

    /**
     * FiberMap plan ID
     */
    public int $fibermapPlanId;

    /**
     * is_visible of the information
     */
    public bool $isVisible;

    /**
     * Properties JSON
     */
    public string $propertiesJson;

    /**
     * Vetro ID
     */
    public string $vetroId;

    /**
     * A geographical address.
     */
    public ?Address $address;

    /**
     * FiberMap plan.
     */
    public ?FibermapPlan $fibermapPlan;

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