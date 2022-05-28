<?php

namespace Modules\Services\Entities;

use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;
use App\Http\Filters\Filterable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasFactory, Translatable, Filterable, HasUploader, InteractsWithMedia;

    protected $fillable = ['created_at', 'updated_at'];

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


    // Relationships
    public function seo()
    {
        return $this->morphOne(Seo::class, 'seoable');
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


    // set seo data
    public function setSeoData()
    {
        $seo = $this->seo()->first();

        if (!$seo) {
            $seo = new Seo();
        }

        $seo->meta_title = $this->meta_title;
        $seo->meta_description = $this->meta_description;
        $seo->meta_keywords = $this->meta_keywords;
        $seo->seoable_id = $this->id;
        $seo->seoable_type = get_class($this);

        $seo->save();
    }

}
