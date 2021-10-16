<?php

namespace SeanKndy\SonarApi\Resources;

class PageInfo extends BaseResource
{
    /**
     * The current page of results.
     */
    public int $page;

    /**
     * The total number of pages available.
     */
    public int $totalPages;

    /**
     * The total number of records available.
     */
    public int $totalCount;

    /**
     * The number of records displayed per page.
     */
    public int $recordsPerPage;

}