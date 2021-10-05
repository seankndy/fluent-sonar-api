<?php

namespace SeanKndy\SonarApi\Queries\Search;

class NullCriteria extends Criteria
{
    public function __construct(string $field, string $operator, $value)
    {
        parent::__construct($field, $operator, $value);

        if ($operator !== '=' && $operator !== '!=') {
            throw new \InvalidArgumentException("Null values only support an equality (=) and inequality (!=) comparison.");
        }
    }

    public function fieldName(): string
    {
        return $this->operator === '=' ? 'unset_fields' : 'exists';
    }

    public function toSonarObject()
    {
        return $this->field;
    }
}