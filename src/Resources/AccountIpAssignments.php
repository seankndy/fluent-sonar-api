<?php

namespace SeanKndy\SonarApi\Resources;

class AccountIpAssignments extends BaseResource
{
    /**
     * The ID of an Account.
     */
    public int $accountId;

    /**
     * An IPv4/IPv6 subnet.
     */
    public string $subnet;

}