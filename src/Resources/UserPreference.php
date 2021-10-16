<?php

namespace SeanKndy\SonarApi\Resources;

class UserPreference extends BaseResource
{
    /**
     * The number of records shown in a paginated table at once.
     */
    public ?int $tablePaginatorSize;

    /**
     * Whether or not the navigation bar on the side is loaded in an expanded state.
     */
    public ?bool $navigationExpanded;

}