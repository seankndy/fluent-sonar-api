<?php

namespace SeanKndy\SonarApi\Resources;

class Department extends BaseResource implements IdentityInterface
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
     * A descriptive name.
     */
    public string $name;

    /**
     * A department in a company.
     * @var \SeanKndy\SonarApi\Resources\CompanyDepartment[]
     */
    public array $companyDepartments;

    /**
     * A signature.
     * @var \SeanKndy\SonarApi\Resources\Signature[]
     */
    public array $signatures;

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