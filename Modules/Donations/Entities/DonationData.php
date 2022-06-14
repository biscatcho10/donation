<?php

namespace Modules\Donations\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonationData extends Model
{
    use HasFactory, Translatable;

    protected $fillable = ['created_at', 'updated_at'];

    protected $table = 'donation_data';

    protected $with = ['translations'];

    public $translatedAttributes = ['title', 'description', 'thanks_msg'];


    

}
