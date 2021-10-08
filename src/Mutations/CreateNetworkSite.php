<?php

namespace SeanKndy\SonarApi\Mutations;

use SeanKndy\SonarApi\Mutations\Inputs\CreateNetworkSiteMutationInput;
use SeanKndy\SonarApi\Resources\NetworkSite;

/**
 * @codeCoverageIgnore 
 */
class CreateNetworkSite extends BaseMutation
{
    public CreateNetworkSiteMutationInput $input;

    public function __construct(CreateNetworkSiteMutationInput $input)
    {
        $this->input = $input;
    }

    public function returnResource(): ?string
    {
        return NetworkSite::class;
    }
}