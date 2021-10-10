<?php

namespace SeanKndy\SonarApi\Mutations;

use GraphQL\Variable;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Mutations\Inputs\Input;
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
     * Client required to run the mutation
     */
    private ?Client $client;

    public function __construct(Client $client = null)
    {
        $this->client = $client;
    }

    public function return(?string $returnResource): self
    {
        if ($returnResource && !is_a($returnResource, ResourceInterface::class, true)) {
            throw new \Exception("Argument must be null or a class that implements ".ResourceInterface::class.".");
        }

        $mutationBuilder = clone $this;
        $mutationBuilder->returnResource = $returnResource;

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
                    ->getQuery()
                    ->query()
                    ->getSelectionSet()
                    : []
            );

        return new Mutation($mutation, $this->variables());
    }

    /**
     * @return mixed
     * @throws \SeanKndy\SonarApi\Exceptions\SonarHttpException
     * @throws \SeanKndy\SonarApi\Exceptions\SonarQueryException
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

    protected function variables(): array
    {
        $variables = [];
        foreach ($this->args as $var => $value) {
            $var = preg_replace('/!$/', '', $var);

            if ($value instanceof Input) {
                $variables[$var] = $value->toArray();
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
            if (substr($var, -1) === '!') {
                $required = true;
                $var = \substr($var, 0, \strlen($var)-1);
            } else {
                $required = false;
            }

            if ($value instanceof Input) {
                $variables[] = new Variable($var, $value->typeName(), $required);
            } else {
                $variables[] = new Variable(
                    $var,
                    $value instanceof TypeInterface ? $value->name() : \ucfirst(gettype($value)),
                    $required
                );
            }
        }
        return $variables;
    }
}