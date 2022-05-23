<?php

namespace Modules\News\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    protected $table = 'news_translations';

    public $timestamps = false;

}
