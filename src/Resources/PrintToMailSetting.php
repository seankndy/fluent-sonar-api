<?php

namespace SeanKndy\SonarApi\Resources;

class PrintToMailSetting extends BaseResource implements IdentityInterface
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
     * Whether the print to mail orders are paid for automatically.
     */
    public bool $autoPay;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * A notification is sent if Print to Mail funds fall below this value.
     */
    public int $lowFundsThreshold;

    /**
     * The print method for the print to mail batch.
     */
    public string $printMethod;

    /**
     * The print type for the print to mail batch.
     */
    public string $printType;

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