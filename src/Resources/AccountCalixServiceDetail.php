<?php

namespace SeanKndy\SonarApi\Resources;

class AccountCalixServiceDetail extends BaseResource implements IdentityInterface
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
     * Calix Inegartion ID.
     */
    public int $calixIntegrationId;

    /**
     * Custom JSON.
     */
    public ?string $customJson;

    /**
     * C-VLAN.
     */
    public ?int $cvlan;

    /**
     * Global VLAN.
     */
    public ?string $globalVlan;

    /**
     * ONT Port ID.
     */
    public ?string $ontPortId;

    /**
     * Policy Map.
     */
    public ?string $policyMap;

    /**
     * Use Custom JSON.
     */
    public ?bool $useCustomJson;

    /**
     * VLAN.
     */
    public ?int $vlan;

    /**
     * The relationship between an `Account` and a `Service`.
     */
    public ?AccountService $accountService;

    /**
     * A configuration for a specific Calix SMx endpoint.
     */
    public ?CalixIntegration $calixIntegration;

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