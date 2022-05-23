<?php

namespace Modules\News\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\News\Entities\News;
use Modules\News\Http\Filters\NewsFilter;

class NewsRepository implements CrudRepository
{
    /**
     * @var \Modules\News\Http\Filters\NewsFilter
     */
    private $filter;

    /**
     * NewsRepository constructor.
     *
     * @param \Modules\News\Http\Filters\NewsFilter $filter
     */
    public function __construct(NewsFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all News as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return News::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\News\Entities\News
     */
    public function create(array $data)
    {
        /** @var News $news */
        $news = News::create($data);

        $news->addAllMediaFromTokens();

        return $news;
    }

    /**
     * Display the given News instance.
     *
     * @param mixed $model
     * @return \Modules\News\Entities\News
     */
    public function find($model)
    {
        if ($model instanceof News) {
            return $model;
        }

        return News::findOrFail($model);
    }

    /**
     * Update the given News in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $news = $this->find($model);

        $news->update($data);

        $news->addAllMediaFromTokens();

        return $news;
    }

    /**
     * Delete the given News from storage.
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
