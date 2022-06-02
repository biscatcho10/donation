<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    protected $table = 'event_translations';

    public $timestamps = false;


}
