<?php

namespace Modules\HowKnow\Http\Filters;

use App\Http\Filters\BaseFilters;

class SelectFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'reason'
    ];

    /**
     * Filter the query by a given reason.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function reason($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('reason', "%$value%");
        }

        return $this->builder;
    }

    /**
     * Sorting results by the given id.
     *
     * @param $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function selectedId($value)
    {
        if ($value) {
            $this->builder->sortingByIds($value);
        }

        return $this->builder;
    }
}
