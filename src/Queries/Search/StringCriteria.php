<?php

namespace SeanKndy\SonarApi\Queries\Search;

class StringCriteria extends Criteria
{
    public function fieldName(): string
    {
        return 'string_fields';
    }

    public function toSonarObject()
    {
        return [
            'attribute' => $this->field,
            'search_value' => $this->value,
            'match' => $this->operator === '=',
            'partial_matching' => false,
        ];
    }
}