<?php

namespace SeanKndy\SonarApi\Reflection;

class Reflection
{
    /**
     * @throws \ReflectionException
     */
    public static function getPropertiesAndTypes($objectOrClass, int $filter = \ReflectionProperty::IS_PUBLIC): array
    {
        $properties = (new \ReflectionClass($objectOrClass))->getProperties($filter);

        $fields = [];
        foreach ($properties as $property) {
            $fields[$property->getName()] = self::getPropertyType($property);
        }
        return $fields;
    }

    public static function getPropertyType(\ReflectionProperty $property): PropertyType
    {
        $type = null;
        $isArray = false;
        if ($docComment = $property->getDocComment()) {
            if (\preg_match('/@var\s+(.+)/', $docComment, $m)) {
                $type = $m[1];
                if (\substr($type, -2) == '[]') {
                    $type = \substr($type, 0, -2);
                    $isArray = true;
                }
            }
        } else if (($type = $property->getType()) !== null) {
            $type = $type->getName();
        }

        if ($type === null) {
            throw new \RuntimeException("Property '".$property->getDeclaringClass()->getName().":".
                $property->getName()."' has no type!");
        }

        return new PropertyType($type, $isArray);
   }
}
