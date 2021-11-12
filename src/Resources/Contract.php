<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class Contract extends BaseResource implements IdentityInterface
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
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * The body.
     */
    public string $body;

    /**
     * The ID of the contact that owns this.
     */
    public ?int $contactId;

    /**
     * The ID of a `ContractTemplate`.
     */
    public ?int $contractTemplateId;

    /**
     * The custom message.
     */
    public ?string $customMessage;

    /**
     * The expiration date.
     */
    public ?string $expirationDate;

    /**
     * The ID of a `HandwrittenSignature`.
     */
    public ?int $handwrittenSignatureId;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The term in months.
     */
    public ?int $termInMonths;

    /**
     * Part of the unique URL used for signing.
     */
    public string $uniqueLinkKey;

    /**
     * A customer account.
     */
    public ?Account $account;

    /**
     * A contact person.
     */
    public ?Contact $contact;

    /**
     * A contract template.
     */
    public ?ContractTemplate $contractTemplate;

    /**
     * The signature on a contract.
     */
    public ?HandwrittenSignature $handwrittenSignature;

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