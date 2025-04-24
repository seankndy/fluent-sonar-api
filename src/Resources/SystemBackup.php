<?php

namespace SeanKndy\SonarApi\Resources;

class SystemBackup extends BaseResource implements IdentityInterface
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
     * A password.
     */
    public ?string $password;

    /**
     * The status.
     */
    public string $status;

    /**
     * A log of a system backup export attempt.
     * @var \SeanKndy\SonarApi\Resources\SystemBackupExport[]
     */
    public array $systemBackupExports;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

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