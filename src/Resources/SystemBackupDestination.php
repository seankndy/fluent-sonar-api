<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class SystemBackupDestination extends BaseResource implements IdentityInterface
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
     * The base path to the directory that the file will be stored in.
     */
    public ?string $basePath;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * When last system backup export was attempted.
     */
    public ?\DateTime $lastExportAt;

    /**
     * The status of the last system backup export.
     */
    public ?string $lastExportStatus;

    /**
     * The service that a system backup will be exported to.
     */
    public string $provider;

    /**
     * A credential used to authenticate against configured destinations to export system backups to.
     * @var \SeanKndy\SonarApi\Resources\SystemBackupDestinationCredential[]
     */
    public array $systemBackupDestinationCredentials;

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