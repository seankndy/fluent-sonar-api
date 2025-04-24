<?php

namespace SeanKndy\SonarApi\Resources;

class DataUsageTotal extends BaseResource
{
    /**
     * The ID of the entity.
     */
    public int $billableInBytes;

    /**
     * The ID of an Account.
     */
    public int $billableOutBytes;

    /**
     * An ID that uniquely identifies this entity across the whole Sonar system.
     */
    public int $freeInBytes;

    /**
     * The date and time this entity was created.
     */
    public int $freeOutBytes;

    /**
     * The last date and time this entity was modified.
     */
    public ?string $dataSourceIdentifier;

    /**
     * The type.
     */
    public ?string $dataSourceParent;

}