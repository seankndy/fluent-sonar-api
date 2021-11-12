<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class SystemBackupExport extends BaseResource implements IdentityInterface
{
    use HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Indicates that this entity has been deleted as part of a pruning.
     */
    public bool $pruned;

    /**
     * The message of the SMTP response.
     */
    public ?string $response;

    /**
     * The status.
     */
    public string $status;

    /**
     * The ID of a destination that a system backup can be exported to.
     */
    public int $systemBackupDestinationId;

    /**
     * The ID of a system backup.
     */
    public int $systemBackupId;

    /**
     * A backup of your Sonar instance's data.
     */
    public ?SystemBackup $systemBackup;

    /**
     * A configured destination to export system backups to.
     */
    public ?SystemBackupDestination $systemBackupDestination;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

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