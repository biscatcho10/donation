<?php

namespace Modules\Donations\Entities;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Services\Entities\Service;

class Donation extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'donor_id',
        'donation_method_id',
        'amount',
        'type',
    ];


    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function donationMethod()
    {
        return $this->belongsTo(DonationMethod::class);
    }
}
