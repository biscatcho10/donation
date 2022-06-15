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
        'donor_name' => 'donor_name',
    ];



    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function donor_name($value)
    {
        if ($value) {
            return $this->builder->whereTranslationLike('name', "%$value%");
        }

        return $this->builder;
    }


    /**
     * Filter the query by a given email.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function email($value)
    {
        if ($value) {
            return $this->builder->where('email', "LIKE", "%$value%");
        }

        return $this->builder;
    }



}
