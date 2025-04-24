<?php

namespace SeanKndy\SonarApi\Resources;

class CreateLinkedAddresses extends BaseResource
{
    /**
     * The ID of the serviceable address to use for this account.
     */
    public ?int $serviceableAddressId;

    /**
     * The name of the serviceable address to use for this account.
     */
    public ?string $serviceableAddressName;

    /**
     * The status of each specific linked address during bulk creation.
     */
    public ?string $status;

    /**
     * The ID of an Account.
     */
    public ?int $accountId;

}