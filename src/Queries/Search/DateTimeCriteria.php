<?php

namespace SeanKndy\SonarApi\Queries\Search;

class DateTimeCriteria extends Criteria
{
    public function fieldName(): string
    {
        return 'datetime_fields';
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

    protected function validOperators(): array
    {
        return ['=', '!=', '>', '<', '>=', '<='];
    }
}