<?php

namespace SeanKndy\SonarApi\Resources;

class HandwrittenSignature extends BaseResource implements IdentityInterface
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
     * The email address of the contact that the contract was originally sent to.
     */
    public ?string $contactEmailAddress;

    /**
     * The name of the contact that the contract was originally sent to.
     */
    public string $contactName;

    /**
     * The role of the contact that the contract was originally sent to.
     */
    public ?string $contactRole;

    /**
     * The IP address of the contract signatory.
     */
    public string $signerIp;

    /**
     * The name provided by the contract signatory.
     */
    public string $signerName;

    /**
     * A contract.
     */
    public ?Contract $contract;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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