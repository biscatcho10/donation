<?php

namespace Modules\Volunteers\Entities\Helpers;


use Modules\Countries\Entities\City;
use Modules\Countries\Entities\Country;

trait VolunteerHelper
{
    /**
     * Get patient's address details
     *
     * @return bool
     */
    public function getAddressLocationAttribute()
    {
        $address = $this->address->address_details;
        $country = Country::find($this->address->country_id)->name;
        $city = City::find($this->address->city_id)->name;
        return "{$address} - {$country} - {$city}";
    }

    /**
     * Get patient's country's flag
     *
     * @return bool
     */
    public function getFlagAttribute()
    {
        $flag = Country::find($this->address->country_id)->getFirstMediaUrl('flags');
        return $flag;
    }

    /**
     * how patient know green apple
     *
     * @return bool
     */
    public function getHowknowUsAttribute()
    {
        $reason = $this->reason->reason;
        return $reason;
    }
}
