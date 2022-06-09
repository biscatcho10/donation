<?php

namespace Modules\HowKnow\Entities;

use App\Http\Filters\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Support\Traits\Selectable;

class Reason extends Model
{
    use HasFactory, Translatable, SoftDeletes, Filterable,Selectable;

   /**
     * @var string
     */
    protected $table = 'reasons';

    protected $guarded = [];

    /**
     * @var string[]
     */

    public $translatedAttributes = ['reason'];
    /**
     * @var string[]
     */
    protected $with = ['translations'];
    

}
