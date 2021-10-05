<?php

namespace SeanKndy\SonarApi\Mutations;

use SeanKndy\SonarApi\Mutations\Inputs\CreatePublicTicketMutationInput;
use SeanKndy\SonarApi\Resources\Ticket;

class CreatePublicTicket extends BaseMutation
{
    public CreatePublicTicketMutationInput $input;

    public function __construct(CreatePublicTicketMutationInput $input)
    {
        $this->input = $input;
    }

     public function returnResource(): ?string
     {
         return Ticket::class;
     }

}