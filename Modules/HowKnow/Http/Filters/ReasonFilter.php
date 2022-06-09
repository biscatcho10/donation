<?php

namespace Modules\HowKnow\Http\Filters;

use App\Http\Filters\BaseFilters;

class ReasonFilter extends BaseFilters
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
}
