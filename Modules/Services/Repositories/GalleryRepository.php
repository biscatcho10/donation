<?php

namespace Modules\Services\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Services\Entities\Gallery;
use Modules\Services\Entities\Service;
use Modules\Services\Http\Filters\GalleryFilter;

class GalleryRepository implements CrudRepository
{
    /**
     * @var \Modules\Services\Http\Filters\GalleryFilter
     */
    private $filter;

    /**
     * ServiceRepository constructor.
     *
     * @param \Modules\Services\Http\Filters\GalleryFilter $filter
     */
    public function __construct(GalleryFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all images as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Gallery::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Services\Entities\Gallery
     */
    public function create(array $data)
    {
        /** @var Gallery $gallery */
        $gallery = Gallery::create($data);

        $gallery->addAllMediaFromTokens();

        return $gallery;
    }

    /**
     * Display the given Gallery instance.
     *
     * @param mixed $model
     * @return \Modules\Services\Entities\Gallery
     */
    public function find($model)
    {
        if ($model instanceof Gallery) {
            return $model;
        }

        return Gallery::findOrFail($model);
    }

    /**
     * Update the given Gallery in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $gallery = $this->find($model);

        $gallery->update($data);

        $gallery->addAllMediaFromTokens();

        return $gallery;
    }

    /**
     * Delete the given Gallery from storage.
     *
     * @param mixed $model
     * @return void
     * @throws \Exception
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }
}
