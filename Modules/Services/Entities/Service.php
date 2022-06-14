<?php

namespace Modules\Services\Entities;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Support\Traits\Selectable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasFactory, Translatable, Filterable, Selectable, HasUploader, InteractsWithMedia;

    protected $fillable = ['created_at', 'updated_at', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $table = 'services';

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
            ->addMediaCollection('images')
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

      /**
     * The service image url.
     *
     * @return bool
     */
    public function getImage()
    {
        return $this->getFirstMediaUrl('images', 'medium');
    }

    public function getImagesAttribute()
    {
        return $this->getMediaResource('images')->take(8);
    }


    // Relationships

    public function sub_services()
    {
        return $this->hasMany(SubService::class, 'service_id');
    }


    public function donations()
    {
        return $this->hasMany(Donation::class, 'service_id');
    }

}
