<?php

namespace SeanKndy\SonarApi\Mutations;

use SeanKndy\SonarApi\Mutations\Inputs\CreatePublicTicketMutationInput;
use SeanKndy\SonarApi\Mutations\Inputs\UpdateTicketMutationInput;
use SeanKndy\SonarApi\Resources\Ticket;
use SeanKndy\SonarApi\Types\Int64Bit;

/**
 * @codeCoverageIgnore
 */
class UpdateTicket extends BaseMutation
{
    public Int64Bit $id;

    public UpdateTicketMutationInput $input;

    public function __construct(Int64Bit $id, UpdateTicketMutationInput $input)
    {
        $this->id = $id;
        $this->input = $input;
    }

    public function returnResource(): ?string
    {
        return Ticket::class;
    }

}