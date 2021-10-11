<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use SeanKndy\SonarApi\Types\Int64Bit;
use SeanKndy\SonarApi\Types\SubnetScalar;

class CreateIpAssignmentMutationInput extends BaseInput
{
    protected SubnetScalar $subnet;

    protected string $ipassignmentableType;

    protected Int64Bit $ipassignmentableId;

    protected bool $soft;

    protected string $reference;

    protected string $description;

    protected NoteMutationInput $note;
}