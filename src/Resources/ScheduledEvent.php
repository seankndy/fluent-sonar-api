<?php

namespace SeanKndy\SonarApi\Resources;

class ScheduledEvent extends BaseResource implements IdentityInterface
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The amount, in the smallest currency value (e.g. cents, pence, pesos.)
     */
    public ?int $amount;

    /**
     * Whether or not this is complete.
     */
    public bool $complete;

    /**
     * The date and time in UTC.
     */
    public \DateTime $datetime;

    /**
     * A human readable description.
     */
    public ?string $description;

    /**
     * An event.
     */
    public string $event;

    /**
     * The ID of an object described by the `event` field.
     */
    public ?string $primaryEventObjectId;

    /**
     * Whether or not to prorate the transaction.
     */
    public ?bool $prorate;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * The `AccountVoiceServiceDetail` records used to configure a voice service when a `ScheduledEvent` is executed.
     * @var \SeanKndy\SonarApi\Resources\ScheduledEventAccountVoiceServiceDetail[]
     */
    public array $scheduledEventAccountVoiceServiceDetails;

    /**
     * The `AccountCalixServiceDetail` records used to configure the Calix integrations when a `ScheduledEvent` is executed.
     * @var \SeanKndy\SonarApi\Resources\ScheduledEventAccountCalixServiceDetail[]
     */
    public array $scheduledEventAccountCalixServiceDetails;

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