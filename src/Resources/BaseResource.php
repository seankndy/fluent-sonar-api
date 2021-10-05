<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Resources\Reflection\Reflection;
use SeanKndy\SonarApi\Types\Type;
use Carbon\Carbon;
use Illuminate\Support\Str;

abstract class BaseResource implements ResourceInterface
{
    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException("Property '$key' does not exist on Resource class " .
                    get_class($this));
            }
            $this->$key = $value;
        }
    }

    public function with(): array
    {
        return [];
    }

    /**
     * Return new instance of resource from the JSON response object using reflection.  You may override this method
     * on a concrete resource if this doesn't suffice or for increased performance.
     * @throws \Exception
     */
    public static function fromJsonObject(object $jsonObject): self
    {
        $data = [];

        foreach (Reflection::getResourceProperties(static::class) as $field => $type) {
            $jsonVar = Str::snake($field);

            if (property_exists($jsonObject, $jsonVar)) {
                if ($type->arrayOf()) {
                    $data[$field] = \array_map(
                        fn($entity) => ($type->type())::fromJsonObject($entity),
                        $jsonObject->$jsonVar->entities
                    );
                } else if (is_a($type->type(), \DateTime::class, true)) {
                    $data[$field] = $jsonObject->$jsonVar ? new \DateTime($jsonObject->$jsonVar) : null;
                } else if (is_a($type->type(), Type::class, true)) {
                    $typeClass = $type->type();
                    $data[$field] = $jsonObject->$jsonVar ? new $typeClass($jsonObject->$jsonVar) : null;
                } else if (is_a($type->type(), ResourceInterface::class, true) && $jsonObject->$jsonVar) {
                    $data[$field] = ($type->type())::fromJsonObject($jsonObject->$jsonVar);
                } else {
                    $data[$field] = $jsonObject->$jsonVar;
                }
            }
        }

        return new static($data);
    }
}