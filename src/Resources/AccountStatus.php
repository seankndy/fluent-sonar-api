<?php

namespace SeanKndy\SonarApi\Resources;

class AccountStatus extends BaseResource implements IdentityInterface
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
     * Whether or not this status activates the account.
     */
    public bool $activatesAccount;

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
     * A customer account.
     * @var \SeanKndy\SonarApi\Resources\Account[]
     */
    public array $accounts;

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