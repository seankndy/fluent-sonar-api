<?php

namespace SeanKndy\SonarApi\Resources;

class DataServiceDetail extends BaseResource
{
    public int $id;

    public int $billingFrequency;

    public int $downloadSpeedKilobitsPerSecond;

    public int $uploadSpeedKilobitsPerSecond;

    public int $serviceId;

    public string $technologyCode;

    public ?string $telradGlobalServiceProfileName;

    public ?int $usageBasedBillingPolicyId;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    /**
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;
}