<?php

namespace SeanKndy\SonarApi\Resources;

class SystemBackupSetting extends BaseResource implements IdentityInterface
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
     * Whether or not to automatically perform a backup every day.
     */
    public bool $automaticBackups;

    /**
     * Whether or not to automatically export backups to configured destinations every day.
     */
    public bool $automaticExports;

    /**
     * Whether or not to automatically delete an exported system backup on a destination configured by a client when pruning exports.
     */
    public bool $deleteExportedBackups;

    /**
     * The number of minutes to wait until a backup in progress is considered to have failed and is ready to be marked as such.
     */
    public int $inProgressBackupExpireMinutes;

    /**
     * The maximum number of backups allowed to exist at any given time.
     */
    public int $maximumBackups;

    /**
     * The maximum number of backup exports allowed to exist at any given time.
     */
    public int $maximumExports;

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