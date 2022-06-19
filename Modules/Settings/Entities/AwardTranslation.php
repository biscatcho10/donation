<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AwardTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public $timestamps = false;

    protected $table = 'award_translations';

    
}
