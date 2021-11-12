<?php

namespace SeanKndy\SonarApi\Resources\Traits;

trait HasIdentity
{
    public int $id;

    public function id(): int
    {
        return $this->id;
    }
}
