<?php

namespace SeanKndy\SonarApi\Queries;

interface QueryInterface
{
    public function query(): \GraphQL\Query;

    public function variables(): array;
}