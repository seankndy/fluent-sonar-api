<?php

namespace SeanKndy\SonarApi\Mutations;

use SeanKndy\SonarApi\Mutations\Inputs\CreateTicketReplyMutationInput;
use SeanKndy\SonarApi\Resources\TicketReply;

class CreateTicketReply extends BaseMutation
{
    public CreateTicketReplyMutationInput $input;

    public function __construct(CreateTicketReplyMutationInput $input)
    {
        $this->input = $input;
    }

     public function returnResource(): ?string
     {
         return TicketReply::class;
     }

}