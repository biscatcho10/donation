<?php

namespace Modules\Donations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'currency',
        'payment_method',
        'payment_id',
        'payment_status',
        'payment_date',
        'payment_details',
        'payment_amount',
        'payment_currency'
    ];
}
