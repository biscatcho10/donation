<?php

namespace Modules\Donations\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DonationDataTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'thanks_msg'];

    public $timestamps = false;

    protected $table = 'donation_data_translations';

}
