<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

class UpdateNetworkSiteMutationInput extends BaseInput
{
    protected string $name;

    protected float $heightInMeters;

    protected UpdateNetworkSiteAddressMutationInput $address;

    /**
     * @var \SeanKndy\SonarApi\Mutations\Inputs\CustomFieldDataMutationInput[]
     */
    protected array $customFieldData;

    /**
     * @var \SeanKndy\SonarApi\Types\Int64Bit[]
     */
    protected array $unsetCustomFieldData;
}