<?php

namespace SeanKndy\SonarApi\Resources;

class Signature extends BaseResource implements IdentityInterface
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
     * The ID of a department.
     */
    public int $departmentId;

    /**
     * Whether or not signature is default for mass messages.
     */
    public bool $massDefault;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * Body of an SMS signature.
     */
    public string $smsSignature;

    /**
     * Whether or not signature is default for triggered messages.
     */
    public bool $triggeredDefault;

    /**
     * A department.
     */
    public ?Department $department;

    /**
     * A message that is sent when a specific event occurs.
     * @var \SeanKndy\SonarApi\Resources\TriggeredMessage[]
     */
    public array $triggeredMessages;

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