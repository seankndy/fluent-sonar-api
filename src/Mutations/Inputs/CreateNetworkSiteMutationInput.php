<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

class CreateNetworkSiteMutationInput extends BaseInput
{
    protected string $name;

    protected float $heightInMeters;

    protected CreateNetworkSiteAddressMutationInput $address;

    /**
     * @var \SeanKndy\SonarApi\Mutations\Inputs\CustomFieldDataMutationInput[]
     */
    protected array $customFieldData;

    /**
     * @var \SeanKndy\SonarApi\Types\Int64Bit[]
     */
    protected array $unsetCustomFieldData;
}