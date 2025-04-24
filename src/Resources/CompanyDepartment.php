<?php

namespace SeanKndy\SonarApi\Resources;

class CompanyDepartment extends BaseResource implements IdentityInterface
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
     * The ID of the company that this entity operates under.
     */
    public int $companyId;

    /**
     * A two character country code for this phone number.
     */
    public ?string $country;

    /**
     * The ID of a department.
     */
    public int $departmentId;

    /**
     * An email address.
     */
    public ?string $emailAddress;

    /**
     * The extension.
     */
    public ?string $extension;

    /**
     * The number.
     */
    public ?string $number;

    /**
     * A phone number formatted for human readability.
     */
    public ?string $numberFormatted;

    /**
     * A company you do business as.
     */
    public ?Company $company;

    /**
     * A department.
     */
    public ?Department $department;

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