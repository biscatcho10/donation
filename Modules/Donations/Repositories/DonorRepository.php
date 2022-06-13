<?php

namespace Modules\Donations\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Donations\Entities\Donor;
use Modules\Donations\Http\Filters\DonorFilter;

class DonorRepository implements CrudRepository
{
    /**
     * @var \Modules\Donations\Http\Filters\DonorFilter
     */
    private $filter;

    /**
     * DonorRepository constructor.
     *
     * @param \Modules\Donations\Http\Filters\DonorFilter $filter
     */
    public function __construct(DonorFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all Donations as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Donor::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Donations\Entities\Donor
     */
    public function create(array $data)
    {
        /** @var Donor $donor */
        $donor = Donor::create($data);

        return $donor;
    }

    /**
     * Display the given Donor instance.
     *
     * @param mixed $model
     * @return \Modules\Donations\Entities\Donor
     */
    public function find($model)
    {
        if ($model instanceof Donor) {
            return $model;
        }

        return Donor::findOrFail($model);
    }

    /**
     * Update the given Donor in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $donor = $this->find($model);

        $donor->update($data);

        return $donor;
    }

    /**
     * Delete the given Donor from storage.
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
