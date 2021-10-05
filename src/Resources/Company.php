<?php

namespace SeanKndy\SonarApi\Resources;

class Company extends BaseResource
{
    public int $id;

    public string $name;

    public string $checksPayableTo;

    public string $country;

    public string $phoneNumber;

    public string $primaryColor;

    public string $secondaryColor;

    public ?string $customerPortalUrl;

    public bool $default;

    public bool $enabled;

    public bool $showRemittanceSlip;

    public ?string $websiteAddress;

    public ?string $taxIdentification;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;
}