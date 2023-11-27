<?php

namespace SeanKndy\SonarApi\Resources;

use Illuminate\Support\Collection;
use SeanKndy\SonarApi\Reflection\Reflection;
use SeanKndy\SonarApi\Resources\Traits\HasAccessLogs;
use SeanKndy\SonarApi\Resources\Traits\HasLogs;
use Illuminate\Support\Str;
use SeanKndy\SonarApi\Types\TypeInterface;

abstract class BaseResource implements ResourceInterface, RelationableResourceInterface
{
    public final function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException("Property '$key' does not exist on Resource class " .
                    get_class($this));
            }
            $this->$key = $value;
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public static function with(): array
    {
        return [];
    }

    /**
     * Return new instance(s) of resource from the JSON response object using reflection.  You may override this method
     * on a concrete resource if this doesn't suffice or for increased performance.
     *
     * @param object|array $jsonObject
     * @return Collection<static>|static
     * @throws \Exception
     */
    public static function fromJsonObject($jsonObject)
    {
        $data = [];

        if (!is_array($jsonObject)) {
            $jsonObjects = [$jsonObject];
        } else {
            $jsonObjects = $jsonObject;
        }

        $result = collect();

        $selfProperties = Reflection::getPropertiesAndTypes(static::class);
        foreach ($jsonObjects as $jsonObj) {
            // build data
            foreach ($selfProperties as $field => $type) {
                $jsonVar = Str::snake($field);

                if (property_exists($jsonObj, $jsonVar)) {
                    if ($type->isResource() && $type->arrayOf()) {
                        if (isset($jsonObj->$jsonVar->entities) && $jsonObj->$jsonVar->entities) {
                            $data[$field] = \array_map(
                                fn(object $entity): ResourceInterface => ($type->type())::fromJsonObject($entity),
                                $jsonObj->$jsonVar->entities
                            );
                        } else {
                            $data[$field] = [];
                        }
                    } else if (is_a($type->type(), \DateTime::class, true)) {
                        $data[$field] = $jsonObj->$jsonVar ? new \DateTime($jsonObj->$jsonVar) : null;
                    } else if (is_a($type->type(), TypeInterface::class, true)) {
                        $typeClass = $type->type();
                        $data[$field] = $jsonObj->$jsonVar ? new $typeClass($jsonObj->$jsonVar) : null;
                    } else if ($type->isResource() && $jsonObj->$jsonVar) {
                        $data[$field] = ($type->type())::fromJsonObject($jsonObj->$jsonVar);
                    } else {
                        $data[$field] = $jsonObj->$jsonVar;
                    }
                }
            }

            $result->push(new static($data));
        }

        return is_array($jsonObject) ? $result : $result->first();
    }
}