<?php

namespace SeanKndy\SonarApi\Queries\Search;

class IntegerCriteria extends Criteria
{
    public function fieldName(): string
    {
        return 'integer_fields';
    }

    public function toSonarObject()
    {
        return [
            'attribute' => $this->field,
            'search_value' => $this->value,
            'operator' => [
                '=' => 'EQ',
                '!=' => 'NEQ',
                '>' => 'GT',
                '<' => 'LT',
                '>=' => 'GTE',
                '<=' => 'LTE',
            ][$this->operator]
        ];
    }
}