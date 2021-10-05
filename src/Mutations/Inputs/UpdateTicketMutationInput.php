<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

class UpdateTicketMutationInput extends BaseInput
{
    protected string $subject;

    protected string $description;

    protected string $status;

    protected string $priority;

    protected int $ticketParentId;

    protected bool $unsetTicketGroupId;
}