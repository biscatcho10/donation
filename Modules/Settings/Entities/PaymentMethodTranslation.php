<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethodTranslation extends Model
{
    use HasFactory;


    protected $fillable = ['name'];

    public $timestamps = false;

    protected $table = 'payment_method_translations';
}
