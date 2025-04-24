<?php

namespace SeanKndy\SonarApi\Resources;

class CreateLinkedAddressesResponse extends BaseResource
{
    /**
     * The total number of address(es) in the range provided.
     */
    public ?int $addressesTotal;

    /**
     * The number of address(es) created in the range provided.
     */
    public ?int $addressesCreated;

    /**
     * The list of address(es) processed in the range provided and details on each.
     * @var \SeanKndy\SonarApi\Resources\CreateLinkedAddresses[]
     */
    public ?array $linkedAddresses;

}