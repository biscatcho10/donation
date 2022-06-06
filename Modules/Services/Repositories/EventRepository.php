<?php

namespace Modules\Services\Repositories;

use Modules\Contracts\ChildCrudRepository;
use Modules\Services\Entities\Event;
use Modules\Services\Http\Filters\EventFilter;

class EventRepository implements ChildCrudRepository
{
    /**
     * @var \Modules\Services\Http\Filters\EventFilter
     */
    private $filter;

    /**
     * ServiceRepository constructor.
     *
     * @param \Modules\Services\Http\Filters\EventFilter $filter
     */
    public function __construct(EventFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all images as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all($album)
    {
        return $album->events()->filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Services\Entities\Event
     */
    public function create($album, array $data)
    {
        $event = $album->events()->create($data);

        $event->addAllMediaFromTokens();

        return $event;
    }

    /**
     * Display the given Event instance.
     *
     * @param mixed $model
     * @return \Modules\Services\Entities\Event
     */
    public function find($model)
    {
        if ($model instanceof Event) {
            return $model;
        }

        return Event::findOrFail($model);
    }

    /**
     * Update the given Event in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $event = $this->find($model);

        $event->update($data);

        $event->addAllMediaFromTokens();

        return $event;
    }

    /**
     * Delete the given Event from storage.
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
