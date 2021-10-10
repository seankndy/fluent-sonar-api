<?php

namespace SeanKndy\SonarApi\Queries\Search;

class BooleanCriteria extends Criteria
{
    public function fieldName(): string
    {
        return 'boolean_fields';
    }

    public function toSonarObject()
    {
        return [
            'attribute' => $this->field,
            'search_value' => $this->value,
        ];
    }

    protected function validOperators(): array
    {
        return ['='];
    }
}