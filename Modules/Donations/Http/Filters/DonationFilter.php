<?php

namespace Modules\Donations\Http\Filters;

use App\Http\Filters\BaseFilters;

class DonationFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'donor' => 'donor',
        'service' => 'service',
        'type' => 'type',
    ];



    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function donor($value)
    {
        if ($value) {
            return $this->builder->where('donor_id', $value);
        }

        return $this->builder;
    }



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




    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function type($value)
    {
        if ($value) {
            return $this->builder->where('type', $value);
        }

        return $this->builder;
    }


}
