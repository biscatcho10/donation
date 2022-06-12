<?php

namespace Modules\Volunteers\Entities;

use App\Http\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Countries\Entities\Address;
use Modules\HowKnow\Entities\Reason;
use Modules\Volunteers\Entities\Helpers\VolunteerHelper;

class Volunteer extends Model
{
    use HasFactory, VolunteerHelper,Filterable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'dob',
        'job',
        'nationality',
        'educational_qualification',
        'how_know_id',
        'skills',
        'experiences',
        'motives',
        'field_id',
        'volunteer_category',
        'category_exp',
        'favorite_time',
        'has_car',
    ];


    protected $casts = [
        'has_car' => 'boolean',
    ];


    // Relationships

    /**
     * @return BelongsTo
     */
    public function reason()
    {
        return $this->belongsTo(Reason::class, 'how_know_id');
    }

    /**
     * @return MorphOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
