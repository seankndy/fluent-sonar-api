<?php

namespace SeanKndy\SonarApi\Resources;

class Aggregation extends BaseResource
{
    /**
     * The field being aggregated.
     */
    public string $field;

    /**
     * The aggregation value, if the aggregation type is anything other than `COUNT`. This is provided as a string to assist with 64bit integer handling in Javascript.
     */
    public ?string $value;

    /**
     * A list of counts, if the aggregation type is `COUNT`.
     * @var \SeanKndy\SonarApi\Resources\AggregationBucketResult[]
     */
    public ?array $counts;

    /**
     * The AggregationFunction used.
     */
    public string $aggregationFunction;

}