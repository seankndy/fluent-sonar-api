<?php

namespace SeanKndy\SonarApi\Resources;

class InstanceServiceFundAutoPay extends BaseResource
{
    /**
     * The instance service fund type.
     */
    public string $instanceServiceFundType;

    /**
     * Whether the instance service is paid for automatically.
     */
    public bool $autoPay;

}