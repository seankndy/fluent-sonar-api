<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class AccountGroup extends BaseResource implements IdentityInterface
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
     * A descriptive name.
     */
    public string $name;

    /**
     * A customer account.
     * @var \SeanKndy\SonarApi\Resources\Account[]
     */
    public array $accounts;

    /**
     * A service.
     * @var \SeanKndy\SonarApi\Resources\Service[]
     */
    public array $services;

    /**
     * An address list defines some criteria by which to group accounts for network policy enforcement.
     * @var \SeanKndy\SonarApi\Resources\AddressList[]
     */
    public array $addressLists;

    /**
     * A RADIUS group.
     * @var \SeanKndy\SonarApi\Resources\RadiusGroup[]
     */
    public array $radiusGroups;

    /**
     * An alerting rotation.
     * @var \SeanKndy\SonarApi\Resources\AlertingRotation[]
     */
    public array $alertingRotations;

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