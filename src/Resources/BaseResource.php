<?php

namespace SeanKndy\SonarApi\Resources;

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
     * Return new instance of resource from the JSON response object using reflection.  You may override this method
     * on a concrete resource if this doesn't suffice or for increased performance.
     *
     * @throws \Exception
     */
    public static function fromJsonObject(object $jsonObject): self
    {
        $data = [];

        foreach (Reflection::getPropertiesAndTypes(static::class) as $field => $type) {
            $jsonVar = Str::snake($field);

            if (property_exists($jsonObject, $jsonVar)) {
                if ($type->isResource() && $type->arrayOf()) {
                    if (isset($jsonObject->$jsonVar->entities) && $jsonObject->$jsonVar->entities) {
                        $data[$field] = \array_map(
                            fn(object $entity): ResourceInterface => ($type->type())::fromJsonObject($entity),
                            $jsonObject->$jsonVar->entities
                        );
                    } else {
                        $data[$field] = [];
                    }
                } else if (is_a($type->type(), \DateTime::class, true)) {
                    $data[$field] = $jsonObject->$jsonVar ? new \DateTime($jsonObject->$jsonVar) : null;
                } else if (is_a($type->type(), TypeInterface::class, true)) {
                    $typeClass = $type->type();
                    $data[$field] = $jsonObject->$jsonVar ? new $typeClass($jsonObject->$jsonVar) : null;
                } else if ($type->isResource() && $jsonObject->$jsonVar) {
                    $data[$field] = ($type->type())::fromJsonObject($jsonObject->$jsonVar);
                } else {
                    $data[$field] = $jsonObject->$jsonVar;
                }
            }
        }

        return new static($data);
    }
}