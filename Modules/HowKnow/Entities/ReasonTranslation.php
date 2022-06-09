<?php

namespace Modules\HowKnow\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReasonTranslation extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'reason_translations';

    public $timestamps = false;

    protected $fillable = ['reason'];
}
