<?php

namespace Modules\Donations\Http\Filters;

use App\Http\Filters\BaseFilters;

class DonorFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'donor',
    ];

    /**
     * Filter the query by a given donor.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function donor($value)
    {
        if ($value) {
            return $this->builder->donor->where('name', "LIKE", "%$value%");
        }

        return $this->builder;
    }


}
