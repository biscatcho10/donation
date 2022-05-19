<?php

namespace Modules\Partners\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'partner_translations';

    public $timestamps = false;


}
