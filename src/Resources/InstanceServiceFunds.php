<?php

namespace SeanKndy\SonarApi\Resources;

class InstanceServiceFunds extends BaseResource
{
    /**
     * The service ID in core used to fund the instance service.
     */
    public int $coreServiceId;

    /**
     * The amount of funds currently available for the instance service. Stored as one hundredth of the smallest currency value (e.g. cents, pence, pesos.)
     */
    public int $availableFundsInHundredths;

    /**
     * The instance service fund type.
     */
    public ?string $instanceServiceFundType;

    /**
     * Whether the instance service is paid for automatically.
     */
    public ?bool $autoPay;

    /**
     * The precision used for the costs associated with this funded service.
     */
    public ?string $costPrecision;

}