<?php

namespace SeanKndy\SonarApi\Queries;

use Illuminate\Support\Str;
use SeanKndy\SonarApi\Queries\Search\Search;

class ReverseRelationFilter
{
    private string $relation;

    private Search $search;

    private ?bool $isEmpty;

    private ?string $group;

    public function __construct(
        string $relation,
        Search $search = null,
        string $group = null,
        bool $isEmpty = null
    ) {
        $this->relation = $relation;
        $this->search = $search ? $search : new Search();
        $this->group = $group;
        $this->isEmpty = $isEmpty;
    }

    public function toArray(): array
    {
        $array = [
            'relation' => \implode('.', \array_map(
                fn(string $rel): string => Str::snake($rel),
                \explode('.', $this->relation)
            )),
        ];
        if (! $this->search->isEmpty()) {
            $array['search'] = $this->search->toArray();
        }
        if ($this->isEmpty !== null) {
            $array['is_empty'] = $this->isEmpty;
        }
        if ($this->group) {
            $array['group'] = $this->group;
        }

        return $array;
    }
}