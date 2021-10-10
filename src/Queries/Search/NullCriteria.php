<?php

namespace SeanKndy\SonarApi\Queries\Search;

class NullCriteria extends Criteria
{
    public function fieldName(): string
    {
        return $this->operator === '=' ? 'unset_fields' : 'exists';
    }

    public function toSonarObject()
    {
        return $this->field;
    }

    protected function validOperators(): array
    {
        return ['=', '!='];
    }
}