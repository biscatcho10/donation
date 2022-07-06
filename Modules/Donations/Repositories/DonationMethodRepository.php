<?php

namespace Modules\Donations\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Donations\Entities\DonationMethod;
use Modules\Donations\Http\Filters\DonationMethodFilter;

class DonationMethodRepository implements CrudRepository
{
    /**
     * @var \Modules\Donations\Http\Filters\DonationMethodFilter
     */
    private $filter;

    /**
     * DonorRepository constructor.
     *
     * @param \Modules\Donations\Http\Filters\DonationMethodFilter $filter
     */
    public function __construct(DonationMethodFilter $filter)
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
        return DonationMethod::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Donations\Entities\DonationMethod
     */
    public function create(array $data)
    {
        /** @var DonationMethod $method */
        $method = DonationMethod::create($data);

        $method->addAllMediaFromTokens();

        return $method;
    }

    /**
     * Display the given Donor instance.
     *
     * @param mixed $model
     * @return \Modules\Donations\Entities\DonationMethod
     */
    public function find($model)
    {
        if ($model instanceof DonationMethod) {
            return $model;
        }

        return DonationMethod::findOrFail($model);
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
        $method = $this->find($model);

        $method->update($data);

        $method->addAllMediaFromTokens();

        return $method;
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
