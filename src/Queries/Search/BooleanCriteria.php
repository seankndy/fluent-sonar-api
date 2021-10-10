<?php

namespace SeanKndy\SonarApi\Queries\Search;

class BooleanCriteria extends Criteria
{
    /**
     * @param mixed $value
     */
    public function __construct(string $field, string $operator, $value)
    {
        parent::__construct($field, $operator, $value);

        if ($operator !== '=') {
            throw new \InvalidArgumentException("Boolean values only support an equality (=) comparison.");
        }
    }

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
}