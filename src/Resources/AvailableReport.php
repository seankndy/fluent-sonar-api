<?php

namespace SeanKndy\SonarApi\Resources;

class AvailableReport extends BaseResource
{
    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The category.
     */
    public string $category;

    /**
     * The endpoint.
     */
    public string $endpoint;

    /**
     * The URL to a thumbnail image.
     */
    public string $thumbnailUrl;

    /**
     * Whether or not this is a custom report.
     */
    public bool $isCustom;

    /**
     * Whether or not this is a personal report.
     */
    public bool $isUser;

}