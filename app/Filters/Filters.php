<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class Filters
{
    protected Builder $builder;
    protected Request $request;
    /**
     * Filters fires only if they are present in request
     */
    protected array $filters = [];
    /**
     * Global filter fires every time
     */
    protected array $globalFilters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->globalFilters as $filter) {
            if (method_exists($this, $filter)) {
                $this->$filter($this->request->$filter);
            }
        }

        foreach ($this->filters as $filter) {
            if ($this->hasFilter($filter)) {
                $this->$filter($this->request->$filter);
            }
        }

        return $this->builder;
    }

    protected function hasFilter($filter): bool
    {
        return method_exists($this, $filter) and $this->request->has($filter);
    }
}
