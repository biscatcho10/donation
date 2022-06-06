<?php

namespace Modules\Services\Repositories;

use Modules\Contracts\ChildCrudRepository;
use Modules\Services\Entities\SubService;
use Modules\Services\Http\Filters\SubServiceFilter;

class SubServiceRepository implements ChildCrudRepository
{
    /**
     * @var \Modules\Services\Http\Filters\SubServiceFilter
     */
    private $filter;

    /**
     * ServiceRepository constructor.
     *
     * @param \Modules\Services\Http\Filters\SubServiceFilter $filter
     */
    public function __construct(SubServiceFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all images as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all($service)
    {
        return $service->sub_services()->filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Services\Entities\SubService
     */
    public function create($service, array $data)
    {
        $sub_service = $service->sub_services()->create($data);

        $sub_service->addAllMediaFromTokens();

        return $sub_service;
    }

    /**
     * Display the given SubService instance.
     *
     * @param mixed $model
     * @return \Modules\Services\Entities\SubService
     */
    public function find($model)
    {
        if ($model instanceof SubService) {
            return $model;
        }

        return SubService::findOrFail($model);
    }

    /**
     * Update the given SubService in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $sub_service = $this->find($model);

        $sub_service->update($data);

        $sub_service->addAllMediaFromTokens();

        return $sub_service;
    }

    /**
     * Delete the given SubService from storage.
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
