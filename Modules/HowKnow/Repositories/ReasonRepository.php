<?php

namespace Modules\HowKnow\Repositories;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Modules\Contracts\CrudRepository;
use Modules\HowKnow\Entities\Reason;
use Modules\HowKnow\Http\Filters\ReasonFilter;

class ReasonRepository implements CrudRepository
{
    /**
     * @var ReasonFilter
     */
    private ReasonFilter $filter;

    /**
     * ReasonRepository constructor.
     * @param ReasonFilter $filter
     */
    public function __construct(ReasonFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function all()
    {
        return Reason::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        $reason = Reason::create($data);

        return $reason;
    }

    /**
     * @param mixed $model
     * @return Model|void
     */
    public function find($model)
    {
        if ($model instanceof Reason) {
            return $model;
        }

        return Reason::findOrFail($model);
    }

    /**
     * @param mixed $model
     * @param array $data
     * @return Model|Reason|void
     */
    public function update($model, array $data)
    {
        $reason = $this->find($model);

        if (!empty($reason)) {
            $reason->update($data);
        }

        return $reason;
    }

    /**
     * soft delete
     * @param mixed $model
     * @throws Exception
     */
    public function delete($model)
    {
        $this->find($model)->delete();
    }


    /**
     * get trashed users type
     * @return LengthAwarePaginator
     */
    public function trashed()
    {
        return Reason::onlyTrashed()->filter($this->filter)->paginate(request('perPage'));
    }


    /**
     * hard delete
     * @param mixed $model
     * @throws Exception
     */
    public function forceDelete($model)
    {
        $this->find($model)->forceDelete();
    }


    /**
     * restore user type
     * @param mixed $model
     * @throws Exception
     */
    public function restore($model)
    {
        $this->find($model)->restore();
    }
}
