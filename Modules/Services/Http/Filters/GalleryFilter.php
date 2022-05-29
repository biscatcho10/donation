<?php

namespace Modules\Services\Http\Filters;

use App\Http\Filters\BaseFilters;

class GalleryFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'service',
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function service($value)
    {
        if ($value) {
            return $this->builder->where('service_id', $value);
        }

        return $this->builder;
    }

}
