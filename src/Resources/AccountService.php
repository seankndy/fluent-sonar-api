<?php

namespace SeanKndy\SonarApi\Resources;

class AccountService extends BaseResource
{
    public int $id;

    public int $accountId;

    public ?\DateTime $additionProrateDate;

    public ?\DateTime $dataUsageLastCalculatedDate;

    public ?string $nameOverride;

    public ?\DateTime $nextBillDate;

    public ?int $numberOfTimesBilled;

    public ?int $packageId;

    public ?string $priceOverrideReason;

    public int $quantity;

    public int $serviceId;

    public ?string $uniquePackageRelationshipId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?Service $service;
}