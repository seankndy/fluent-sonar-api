<?php

namespace SeanKndy\SonarApi\Resources;

interface RelationableResourceInterface
{
    /**
     * Defines which relations to always load in query.  Return associative array containing the relation
     * field name as key and value being anything non-null OR a closure that will receive a QueryBuilder
     * for the relation.
     */
    public static function with(): array;
}