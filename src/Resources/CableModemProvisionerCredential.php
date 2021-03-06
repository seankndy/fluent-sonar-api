<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class CableModemProvisionerCredential extends BaseResource implements IdentityInterface
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
     * The ID of a `CableModemProvisioner`.
     */
    public int $cableModemProvisionerId;

    /**
     * An individual credential to authenticate to a cable modem provisioner.
     */
    public string $credential;

    /**
     * The credential value (e.g. username, password, etc.)
     */
    public string $value;

    /**
     * A cable modem provisioner.
     */
    public ?CableModemProvisioner $cableModemProvisioner;

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