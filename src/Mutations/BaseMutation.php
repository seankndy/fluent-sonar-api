<?php

namespace SeanKndy\SonarApi\Mutations;

use Illuminate\Support\Str;
use SeanKndy\SonarApi\Mutations\Inputs\Input;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use GraphQL\Variable;
use SeanKndy\SonarApi\Types\TypeInterface;

abstract class BaseMutation implements MutationInterface
{
    public function query(): \GraphQL\Mutation
    {
        $properties = (new \ReflectionClass($this))
            ->getProperties(\ReflectionProperty::IS_PUBLIC);

        $variables = $arguments = [];
        foreach ($properties as $property) {
            $var = $property->getName();
            $value = $this->$var;
            $required = ! $property->getType()->allowsNull();

            if ($value instanceof Input) {
                $variables[] = new Variable($var, $value->typeName(), $required);
            } else {
                $variables[] = new Variable(
                    $var,
                    $value instanceof TypeInterface ? $value->name() : \ucfirst(gettype($value)),
                    $required
                );
            }
            $arguments[$var] = '$'.$var;
        }

        return (new \GraphQL\Mutation($this->name()))
            ->setVariables($variables)
            ->setArguments($arguments)
            ->setSelectionSet(
            $this->returnResource()
                ? (new QueryBuilder($this->returnResource(), ''))
                    ->withMany(false)
                    ->getQuery()
                    ->query()
                    ->getSelectionSet()
                : []
            );
    }

    public function variables(): array
    {
        $variables = [];
        foreach (\get_object_vars($this) as $var => $value) {
            if ($value instanceof Input) {
                $variables[$var] = $value->toArray();
            } else {
                $variables[$var] = $value instanceof TypeInterface ? $value->value() : $value;
            }
        }
        return $variables;
    }

    /**
     * Return name of the Sonar GraphQL mutation.
     */
    public function name(): string
    {
        return Str::camel((new \ReflectionClass(static::class))->getShortName());
    }

    abstract public function returnResource(): ?string;
}