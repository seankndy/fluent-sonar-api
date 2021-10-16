<?php

namespace SeanKndy\SonarApi\Resources;

class AggregationBucketResult extends BaseResource
{
    /**
     * The string that was matched.
     */
    public string $value;

    /**
     * The quantity of items matching the string in `bucket_value`.
     */
    public string $count;

    /**
     * The results of a sub-aggregation query.
     * @var \SeanKndy\SonarApi\Resources\Aggregation[]
     */
    public ?array $subAggregatorResults;

}