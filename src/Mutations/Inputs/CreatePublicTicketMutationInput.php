<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use Carbon\Carbon;

class CreatePublicTicketMutationInput extends BaseInput
{
    protected ?string $subject;

    protected ?string $description;

    protected string $status;

    protected string $priority;

    protected ?Carbon $dueDate;

    protected int $ticketableId;

    protected string $ticketableType;

    protected ?int $parentTicketId;

    protected ?int $ticketGroupId;

    protected int $inboundMailboxId;

}