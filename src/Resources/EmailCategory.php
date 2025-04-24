<?php

namespace SeanKndy\SonarApi\Resources;

class EmailCategory extends BaseResource implements IdentityInterface
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
     * Whether or not this entity is a default entry.
     */
    public bool $default;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A contact person.
     * @var \SeanKndy\SonarApi\Resources\Contact[]
     */
    public array $contacts;

    /**
     * A message that is sent when a specific event occurs.
     * @var \SeanKndy\SonarApi\Resources\TriggeredMessage[]
     */
    public array $triggeredMessages;

    /**
     * An `Email` that is sent when a particular event occurs.
     * @var \SeanKndy\SonarApi\Resources\TriggeredEmail[]
     */
    public array $triggeredEmails;

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