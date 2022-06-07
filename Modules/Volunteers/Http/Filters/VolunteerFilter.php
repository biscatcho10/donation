<?php

namespace Modules\Volunteers\Http\Filters;

use App\Http\Filters\BaseFilters;

class VolunteerFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'email',
        'phone',
        'address',
        'dob',
        'nationality',
        'educational_qualification'
    ];

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value)
    {
        if ($value) {
            return $this->builder->where('name', "LIKE", "%$value%");
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



    /**
     * Filter the query by a given phone.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function phone($value)
    {
        if ($value) {
            return $this->builder->where('phone', "LIKE", "%$value%");
        }

        return $this->builder;
    }



    /**
     * Filter the query by a given address.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function address($value)
    {
        if ($value) {
            return $this->builder->where('address', "LIKE", "%$value%");
        }

        return $this->builder;
    }



    /**
     * Filter the query by a given dob.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function dob($value)
    {
        if ($value) {
            $value = date('Y-m-d', strtotime($value));
            return $this->builder->where('dob', "LIKE", "%$value%");
        }

        return $this->builder;
    }



    /**
     * Filter the query by a given
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function nationality($value)
    {
        if ($value) {
            return $this->builder->where('nationality', "LIKE", "%$value%");
        }

    }

    /**
     * Filter the query by a given
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function educational_qualification($value)
    {
        if ($value) {
            return $this->builder->where('educational_qualification', "LIKE", "%$value%");
        }

        return $this->builder;
    }




}
