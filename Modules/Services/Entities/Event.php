<?php

namespace Modules\Services\Entities;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, Translatable, Filterable, HasUploader, InteractsWithMedia;

    protected $fillable = ['album_id', 'meta_title', 'meta_description', 'meta_keywords'];

    public $translatedAttributes = ['name', 'description'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'translations',
        'media',
    ];

    /**
     * Define the media collections.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('events')
            ->useFallbackUrl('https://www.partnerimages.io/' . $this->code . '/shiny/64.png')
            ->registerMediaConversions(function () {
                $this->addMediaConversion('thumb')
                    ->width(50);

                $this->addMediaConversion('small')
                    ->width(120);

                $this->addMediaConversion('medium')
                    ->width(160);

                $this->addMediaConversion('large')
                    ->width(320);

                $this->addMediaConversion('extra_large')
                    ->width(720);
            });
    }


    public function getImagesAttribute()
    {
        return $this->getMediaResource('events')->take(8);
    }


    /**
     * The service image url.
     *
     * @return bool
     */
    public function getImage()
    {
        return $this->getFirstMediaUrl('events', 'large');
    }


    // Relationships
    public function album()
    {
        return $this->belongsTo(Gallery::class, 'album_id');
    }

}
