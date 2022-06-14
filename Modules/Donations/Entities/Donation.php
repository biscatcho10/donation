<?php

namespace Modules\Donations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Services\Entities\Service;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'amount',
        'currency',
        'payment_method',
        'payment_id',
        'payment_status',
        'payment_date',
        'payment_details',
        'general',
        'service_id',
    ];


    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
