<?php

namespace Modules\Donations\Entities;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donor extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'nearest_landmark',
    ];


    public function donations()
    {
        return $this->hasMany(Donation::class);
    }


    public function getDonationsCountAttribute()
    {
        return $this->donations->count();
    }


    public function getDonationsAmountAttribute()
    {
        return $this->donations->sum('amount');
    }


    public function getDonationsAmountFormattedAttribute()
    {
        return number_format($this->donations_amount, 2);
    }

}
