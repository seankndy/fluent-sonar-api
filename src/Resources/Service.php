<?php

namespace SeanKndy\SonarApi\Resources;

class Service extends BaseResource
{
    public int $id;

    public ?int $amount;

    public string $application;

    public ?int $companyId;

    public bool $displayIfZero;

    public bool $enabled;

    public ?int $generalLedgerCodeId;

    public string $name;

    public string $type;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public ?DataServiceDetail $dataServiceDetail;
}