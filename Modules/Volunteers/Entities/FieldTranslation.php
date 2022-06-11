<?php

namespace Modules\Volunteers\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FieldTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'field_translations';

    public $timestamps = false;


}
