<?php

namespace SeanKndy\SonarApi\Queries\Search;

use SeanKndy\SonarApi\Types\Date;
use SeanKndy\SonarApi\Types\Datetime;

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
    public final function __construct(string $field, string $operator, $value)
    {
        if (!in_array($operator, $this->validOperators())) {
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
        $type = is_object($value) ? get_class($value) : gettype($value);

        switch ($type) {
            case 'integer':
                $criteriaClass = IntegerCriteria::class;
                break;
            case 'boolean':
                $criteriaClass = BooleanCriteria::class;
                break;
            case Date::class:
                $criteriaClass = DateCriteria::class;
                break;
            case Datetime::class:
                $criteriaClass = DatetimeCriteria::class;
                break;
            case 'NULL':
                $criteriaClass = NullCriteria::class;
                break;
            default:
                $criteriaClass = StringCriteria::class;
        }

        return new $criteriaClass($field, $operator, $value);
    }

    abstract protected function validOperators(): array;
}