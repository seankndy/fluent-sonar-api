<?php

namespace SeanKndy\SonarApi\Queries\Search;

class Search
{
    /**
     * @var CriteriaGroup[]
     */
    private array $whereCriteriaGroups = [];

    /**
     * @var CriteriaGroup[]
     */
    private array $orWhereCriteriaGroups = [];

    public function where(string $field, ...$args): self
    {
        if (!($operatorAndValue = $this->getOperatorAndValue($args))) {
            throw new \InvalidArgumentException("Minimum of 2 arguments, maximum of 3.");
        }
        [$operator, $value] = $operatorAndValue;

        $search = clone $this;

        // if where() happens after an orWhere() then put the incoming where() criteria into
        // the last orWhere group.
        if ($search->whereCriteriaGroups && $search->orWhereCriteriaGroups) {
            if (is_array($value)) {
                throw new \RuntimeException(
                    'You cannot call where() with array of values after an orWhere() due to limitations with Sonar searching.'
                );
            }

            $search->orWhereCriteriaGroups[\count($search->orWhereCriteriaGroups)-1]->add($field, $operator, $value);

            return $search;
        }

        if (!is_array($value)) {
            $value = [$value];
        }

        if ($search->whereCriteriaGroups) {
            $whereCriteriaGroups = [];

            foreach ($search->whereCriteriaGroups as $criteriaGroup) {
                foreach ($value as $v) {
                    $whereCriteriaGroups[] = $criteriaGroup->merge(
                        (new CriteriaGroup())->add($field, $operator, $v)
                    );
                }
            }

            $search->whereCriteriaGroups = $whereCriteriaGroups;
        } else {
            foreach ($value as $v) {
                $search->whereCriteriaGroups[] = (new CriteriaGroup())->add($field, $operator, $v);
            }
        }

        return $search;
    }

    public function orWhere(string $field, ...$args): self
    {
        if (!$this->whereCriteriaGroups) {
            throw new \RuntimeException('You cannot call orWhere() before where()!');
        }

        if (!($operatorAndValue = $this->getOperatorAndValue($args))) {
            throw new \InvalidArgumentException("Minimum of 2 arguments, maximum of 3.");
        }
        [$operator, $value] = $operatorAndValue;

        $search = clone $this;

        $search->orWhereCriteriaGroups[] = (new CriteriaGroup())->add($field, $operator, $value);

        return $search;
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->whereCriteriaGroups as $criteriaGroup) {
            $array[] = $criteriaGroup->toArray();
        }
        foreach ($this->orWhereCriteriaGroups as $criteriaGroup) {
            $array[] = $criteriaGroup->toArray();
        }
        return $array;
    }

    private function getOperatorAndValue(array $args): array
    {
        if (count($args) == 1) {
            $operator = '=';
            $value = $args[0];
        } else if (count($args) == 2) {
            $operator = $args[0];
            $value = $args[1];
        } else {
            return [];
        }

        return [$operator, $value];
    }
}

