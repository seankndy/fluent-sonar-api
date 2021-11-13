<?php

namespace SeanKndy\SonarApi\Mutations;

use GraphQL\Variable;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Mutations\Inputs\InputInterface;
use SeanKndy\SonarApi\Mutations\Inputs\InputBuilder;
use SeanKndy\SonarApi\Queries\QueryBuilder;
use SeanKndy\SonarApi\Resources\ResourceInterface;
use SeanKndy\SonarApi\Types\TypeInterface;

/** @psalm-suppress PropertyNotSetInConstructor */
class MutationBuilder
{
    /**
     * Mutation's name/method
     */
    private string $name;
    /**
     * Mutation's arguments/variables
     */
    private array $args;
    /**
     * Resource class to return from mutation response
     */
    private ?string $returnResource;
    /**
     * If populated, return only these fields from resource.
     */
    private array $returnResourceFields = [];
    /**
     * Client required to run the mutation
     */
    private ?Client $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client;
    }

    public function return(?string $returnResource, array $only = []): self
    {
        if ($returnResource && !is_a($returnResource, ResourceInterface::class, true)) {
            throw new \Exception("Argument must be null or a class that implements ".ResourceInterface::class.".");
        }

        $mutationBuilder = clone $this;
        $mutationBuilder->returnResource = $returnResource;
        $mutationBuilder->returnResourceFields = $only;

        return $mutationBuilder;
    }

    public function __call(string $name, array $args)
    {
        if ($args && !\is_array($args = current($args))) {
            throw new \InvalidArgumentException("Mutation argument must be an array.");
        }

        $mutationBuilder = clone $this;
        $mutationBuilder->name = $name;
        $mutationBuilder->args = $args;

        foreach ($mutationBuilder->args as $var => $value) {
            if (\is_callable($value)) {
                $mutationBuilder->args[$var] = $value(new InputBuilder())->build();
            }
        }

        return $mutationBuilder;
    }

    public function getQuery(): MutationInterface
    {
        $mutation = new \GraphQL\Mutation($this->name);
        $mutation
            ->setVariables($this->variableDeclarations())
            ->setArguments($this->mutationArguments())
            ->setSelectionSet(
                $this->returnResource
                    ? (new QueryBuilder($this->returnResource, ''))
                    ->withMany(false)
                    ->only($this->returnResourceFields ?: [])
                    ->getQuery()
                    ->query()
                    ->getSelectionSet()
                    : []
            );

        return new Mutation($mutation, $this->variables($this->args));
    }

    /**
     * @return mixed
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarFormatException
     */
    public function run()
    {
        if (! $this->client) {
            throw new \RuntimeException("Cannot call run() without a client!");
        }

        $response = $this->client->mutate($this->getQuery());

        if ($this->returnResource) {
            return ($this->returnResource)::fromJsonObject($response->{$this->name});
        }

        return $response;
    }

    protected function variables(array $args): array
    {
        $variables = [];
        foreach ($args as $var => $value) {
            $var = preg_replace('/!$/', '', $var);

            if ($value instanceof InputInterface) {
                $variables[$var] = $value->toArray();
            } else if (\is_array($value)) {
                $variables[$var] = $this->variables($value);
            } else {
                $variables[$var] = $value instanceof TypeInterface ? $value->value() : $value;
            }
        }
        return $variables;
    }

    protected function mutationArguments(): array
    {
        $args = [];
        foreach ($this->args as $var => $val) {
            $var = preg_replace('/!$/', '', $var);
            $args[$var] = '$'.$var;
        }
        return $args;
    }

    protected function variableDeclarations(): array
    {
        $variables = [];
        foreach ($this->args as $var => $value) {
            if (\substr($var, -1) === '!') {
                $required = true;
                $var = \substr($var, 0, \strlen($var)-1);
            } else {
                $required = false;
            }

            $variables[] = $this->getGraphQlVariable($var, $value, $required);
        }
        return $variables;
    }

    /**
     * @param mixed $value
     */
    protected function getGraphQlVariable(string $name, $value, bool $required = false): Variable
    {
        if (\is_array($value)) {
            if (($firstKey = \array_key_first($value)) === null) {
                throw new \RuntimeException("Array for input variable '$name' is empty.");
            }

            $firstValue = $value[$firstKey];
            $array = true;

            if (\array_filter($value, function ($v) use ($firstValue) {
                return (gettype($v) == 'object' ? get_class($v) : gettype($v))
                    !== (gettype($firstValue) == 'object' ? get_class($firstValue) : gettype($firstValue));
            })) {
                throw new \RuntimeException("Array of elements for input variable '$name' provided must be " .
                    "all of the same type, however there are types mixed.");
            }

            $value = $firstValue;
        } else {
            $array = false;
        }

        $type = $value instanceof InputInterface
            ? $value->typeName()
            : ($value instanceof TypeInterface
                ? $value->name()
                : \ucfirst(gettype($value))
              );

        return new Variable($name, $array ? '['.$type.']' : $type, $required);
    }
}