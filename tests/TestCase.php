<?php

namespace SeanKndy\SonarApi\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * @return mixed
     * @throws \ReflectionException
     */
    protected function accessProtectedProperty(object $object, string $propertyName)
    {
        $reflection = new \ReflectionClass($object);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);

        return $property->getValue($object);
    }

    /**
     * @throws \ReflectionException
     */
    protected function getGraphQlQuerySelectionsAsArray(\GraphQL\Query $query): array
    {
        $array = [];

        foreach ($query->getSelectionSet() as $value) {
            if ($value instanceof \GraphQL\Query) {
                $fieldName = $this->accessProtectedProperty($value, 'fieldName');
                $array[$fieldName] = $this->getGraphQlQuerySelectionsAsArray($value);
            } else {
                $array[] = $value;
            }
        }

        return $array;
    }
}