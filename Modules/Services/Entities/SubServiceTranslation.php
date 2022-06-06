<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubServiceTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    protected $table = 'sub_service_translations';

    public $timestamps = false;
}
