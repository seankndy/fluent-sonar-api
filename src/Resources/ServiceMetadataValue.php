<?php

namespace SeanKndy\SonarApi\Resources;

class ServiceMetadataValue extends BaseResource implements IdentityInterface
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
     * The ID of an AccountService.
     */
    public int $accountServiceId;

    /**
     * The ID of a ServiceMetadata field.
     */
    public int $serviceMetadataId;

    /**
     * The value.
     */
    public string $value;

    /**
     * The relationship between an `Account` and a `Service`.
     */
    public ?AccountService $accountService;

    /**
     * Fields that store metadata about individual instances of `Service`s.
     */
    public ?ServiceMetadata $serviceMetadatum;

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