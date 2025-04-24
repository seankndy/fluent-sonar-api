<?php

namespace SeanKndy\SonarApi\Resources;

class MassEmail extends BaseResource implements IdentityInterface
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
     * The email address to send from when using this email message. If `null`, then the system default will be used.
     */
    public string $fromEmailAddress;

    /**
     * The name to send from when using this email message. If `null`, then the system default will be used.
     */
    public string $fromName;

    /**
     * A short sentence that will be shown as a preview in compatible email clients.
     */
    public ?string $inboxPreview;

    /**
     * The message.
     */
    public string $message;

    /**
     * The subject.
     */
    public string $subject;

    /**
     * The ID of a User.
     */
    public int $userId;

    /**
     * A user that can login to Sonar.
     */
    public ?User $user;

    /**
     * A contact person.
     * @var \SeanKndy\SonarApi\Resources\Contact[]
     */
    public array $contacts;

    /**
     * A file.
     * @var \SeanKndy\SonarApi\Resources\File[]
     */
    public array $files;

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