<?php

namespace SeanKndy\SonarApi\Queries\Search;

interface CriteriaInterface
{
    /**
     * Name of the search field in Sonar (ex. string_fields, integer_fields, etc).
     */
    public function fieldName(): string;

    /**
     * Value representing of the criteria suitable to be json_encoded as a Sonar search object.
     * @return mixed
     */
    public function toSonarObject();
}