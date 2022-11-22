<?php

namespace SeanKndy\SonarApi\Queries\Search;

class DatetimeCriteria extends Criteria
{
    public function fieldName(): string
    {
        return 'datetime_fields';
    }

    public function toSonarObject(): array
    {
        return [
            'attribute' => $this->field,
            'search_value' => (string)$this->value,
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