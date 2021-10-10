<?php

namespace SeanKndy\SonarApi\Queries\Search;

class CriteriaGroup
{
    /**
     * @var CriteriaInterface[]
     */
    private array $criterias;

    public function __construct(array $criterias = [])
    {
        $this->criterias = $criterias;
    }

    /**
     * @param mixed $value
     */
    public function add(string $field, string $operator, $value): self
    {
        $this->criterias[] = Criteria::create($field, $operator, $value);

        return $this;
    }

    public function getCriterias(): array
    {
        return $this->criterias;
    }

    /**
     * Take CriteriaGroup $criteriaGroup and merge it with $this CriteriaGroup and return a new CriteriaGroup
     * with the combined values.
     */
    public function merge(CriteriaGroup $criteriaGroup): self
    {
         return new CriteriaGroup(
             \array_merge($this->criterias, $criteriaGroup->getCriterias())
         );
    }

    public function toArray(): array
    {
        $array = [];
        foreach ($this->criterias as $criteria) {
            if (!isset($array[$criteria->fieldName()])) {
                $array[$criteria->fieldName()] = [];
            }
            $array[$criteria->fieldName()][] = $criteria->toSonarObject();
        }
        return $array;
    }
}