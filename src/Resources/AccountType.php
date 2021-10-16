<?php

namespace SeanKndy\SonarApi\Resources;

class AccountType extends BaseResource
{
    /**
     * The ID of the entity.
     */
    public int $id;

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
     * The ID of an `InvoiceMessage`.
     */
    public ?int $invoiceMessageId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The type.
     */
    public string $type;

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
     * An alerting rotation.
     * @var \SeanKndy\SonarApi\Resources\AlertingRotation[]
     */
    public array $alertingRotations;

    /**
     * A RADIUS group.
     * @var \SeanKndy\SonarApi\Resources\RadiusGroup[]
     */
    public array $radiusGroups;

    /**
     * A message that is appended to specific invoices.
     */
    public ?InvoiceMessage $invoiceMessage;

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