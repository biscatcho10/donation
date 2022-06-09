<?php

namespace Modules\Volunteers\Repositories;

use Modules\Contracts\CrudRepository;
use Modules\Volunteers\Entities\Volunteer;
use Modules\Volunteers\Http\Filters\VolunteerFilter;

class VolunteerRepository implements CrudRepository
{
    /**
     * @var \Modules\Volunteers\Http\Filters\VolunteerFilter
     */
    private $filter;

    /**
     * VolunteerRepository constructor.
     *
     * @param \Modules\Volunteers\Http\Filters\VolunteerFilter $filter
     */
    public function __construct(VolunteerFilter $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Get all Volunteers as a collection.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function all()
    {
        return Volunteer::filter($this->filter)->paginate(request('perPage'));
    }

    /**
     * Save the created model to storage.
     *
     * @param array $data
     * @return \Modules\Volunteers\Entities\Volunteer
     */
    public function create(array $data)
    {
        /** @var Volunteer $volunteer */
        $volunteer = Volunteer::create($data);

        // add volunteer's address
        $volunteer->address()->create(['address_details' => $data['address_details'], 'country_id' => $data['country_id'], 'city_id' => $data['city_id']]);


        return $volunteer;
    }

    /**
     * Display the given Volunteer instance.
     *
     * @param mixed $model
     * @return \Modules\Volunteers\Entities\Volunteer
     */
    public function find($model)
    {
        if ($model instanceof Volunteer) {
            return $model;
        }

        return Volunteer::findOrFail($model);
    }

    /**
     * Update the given Volunteer in the storage.
     *
     * @param mixed $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($model, array $data)
    {
        $volunteer = $this->find($model);

        // update volunteer's address
        $volunteer->address()->update(['address_details' => $data['address_details'], 'country_id' => $data['country_id'], 'city_id' => $data['city_id']]);

        if (!empty($volunteer)) {
            $volunteer->update($data);
        }

        return $volunteer;
    }

    /**
     * Delete the given Volunteer from storage.
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
