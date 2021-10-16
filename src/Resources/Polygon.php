<?php

namespace SeanKndy\SonarApi\Resources;

class Polygon extends BaseResource
{
    /**
     * The connection wrapper around the `Vertex` type.
     * @var \SeanKndy\SonarApi\Resources\Vertex[]
     */
    public array $vertexes;

}