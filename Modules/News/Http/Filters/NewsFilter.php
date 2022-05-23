<?php

namespace Modules\News\Http\Filters;

use App\Http\Filters\BaseFilters;

class NewsFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'content',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function title($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('title', "%$value%");
        }

        return $this->builder;
    }


    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function content($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('content', "%$value%");
        }

        return $this->builder;
    }

}
