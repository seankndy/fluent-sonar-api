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

    protected function getGraphQlQueryVariableDeclarations(\GraphQL\Query $query): array
    {
        $variables = [];

        if (\preg_match('/(?:mutation|query)\((.+?)\)/si', (string)$query, $m)) {
            $words = preg_split('/\s+/', $m[1]);
            for ($i = 0; $i < \count($words); $i += 2) {
                $variables[str_replace(['$', ':'], '', $words[$i])] = $words[$i + 1];
            }
        }

        return $variables;
    }
}