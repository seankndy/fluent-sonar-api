<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use SeanKndy\SonarApi\Types\Int64Bit;

class CustomFieldDataMutationInput extends BaseInput
{
    protected Int64Bit $customFieldId;

    protected string $value;
}