<?php

namespace Modules\Partners\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Partners\Entities\Partner;
use Modules\Partners\Http\Filters\PartnerFilter;

class PartnerRepository implements CrudRepository
{
    /**
     * @var \Modules\Partners\Http\Filters\PartnerFilter
     */
    private $filter;

    /**
     * PartnerRepository constructor.
     *
     * @param \Modules\Partners\Http\Filters\PartnerFilter $filter
     */
    public function __construct(PartnerFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all Partners as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Partner::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Partners\Entities\Partner
     */
    public function create(array $data)
    {
        /** @var Partner $partner */
        $partner = Partner::create($data);

        $partner->addAllMediaFromTokens();

        return $partner;
    }

    /**
     * Display the given Partner instance.
     *
     * @param mixed $model
     * @return \Modules\Partners\Entities\Partner
     */
    public function find($model)
    {
        if ($model instanceof Partner) {
            return $model;
        }

        return Partner::findOrFail($model);
    }

    /**
     * Update the given Partner in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $partner = $this->find($model);

        $partner->update($data);

        $partner->addAllMediaFromTokens();

        return $partner;
    }

    /**
     * Delete the given Partner from storage.
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
