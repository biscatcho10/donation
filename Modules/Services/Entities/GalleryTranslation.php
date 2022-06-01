<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    protected $table = 'gallery_translations';

    public $timestamps = false;


}
