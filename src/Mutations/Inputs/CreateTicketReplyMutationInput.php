<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

class CreateTicketReplyMutationInput extends BaseInput
{
    protected int $ticketId;

    protected ?string $body;

    protected bool $incoming;

    protected string $author;

    protected string $authorEmail;
}