<?php

namespace SeanKndy\SonarApi\Queries\Search;

abstract class Criteria implements CriteriaInterface
{
    protected string $field;

    protected string $operator;

    /**
     * @var mixed
     */
    protected $value;

    /**
     * @param mixed $value
     */
    public function __construct(string $field, string $operator, $value)
    {
        if (!in_array($operator, ['=', '!=', '>', '<', '>=', '<='])) {
            throw new \InvalidArgumentException("Operator '$operator' not a valid operator.");
        }

        $this->field = $field;
        $this->operator = $operator;
        $this->value = $value;
    }

    /**
     * @param mixed $value
     */
    public static function create(string $field, string $operator, $value): Criteria
    {
        switch (gettype($value)) {
            case 'integer':
                $criteriaClass = IntegerCriteria::class;
                break;
            case 'boolean':
                $criteriaClass = BooleanCriteria::class;
                break;
            case 'NULL':
                $criteriaClass = NullCriteria::class;
                break;
            default:
                $criteriaClass = StringCriteria::class;
        }

        return new $criteriaClass($field, $operator, $value);
    }
}