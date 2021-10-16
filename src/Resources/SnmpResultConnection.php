<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpResultConnection extends BaseResource
{
    /**
     * An OID
     */
    public string $oid;

    /**
     * An SNMP monitoring result type.
     */
    public string $type;

    /**
     * SNMP monitoring results.
     * @var \SeanKndy\SonarApi\Resources\SnmpResult[]
     */
    public array $results;

}