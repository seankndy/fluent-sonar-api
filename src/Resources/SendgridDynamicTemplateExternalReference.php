<?php

namespace SeanKndy\SonarApi\Resources;

class SendgridDynamicTemplateExternalReference extends BaseResource implements IdentityInterface
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
     * The ID of an `EmailMessageContent`.
     */
    public int $emailMessageContentId;

    /**
     * The external identifier of a dynamic template at SendGrid.
     */
    public string $sendgridIdentifier;

    /**
     * The ID of a `TriggeredMessage`.
     */
    public int $triggeredMessageId;

    /**
     * A message that is sent when a specific event occurs.
     */
    public ?TriggeredMessage $triggeredMessage;

    /**
     * The localized content of an `EmailMessage`.
     */
    public ?EmailMessageContent $emailMessageContent;

    /**
     * A company you do business as.
     */
    public ?Company $company;

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