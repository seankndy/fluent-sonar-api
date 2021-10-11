<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasNotes;

class DataServiceDetail extends BaseResource
{
    use HasNotes;

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
}