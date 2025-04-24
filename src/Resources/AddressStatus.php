<?php

namespace SeanKndy\SonarApi\Resources;

class AddressStatus extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;
    use Traits\HasAddresses;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Color.
     */
    public string $color;

    /**
     * An icon.
     */
    public string $icon;

    /**
     * A descriptive name.
     */
    public string $name;

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