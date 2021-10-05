<?php

namespace SeanKndy\SonarApi\Mutations;

use SeanKndy\SonarApi\Queries\QueryInterface;

interface MutationInterface extends QueryInterface
{
    public function query(): \GraphQL\Mutation;
}