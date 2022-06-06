<?php

namespace Modules\Services\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Services\Entities\Service;
use Modules\Services\Http\Filters\SelectFilter;
use Modules\Services\Transformers\ServiceSelectResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return AnonymousResourceCollection
     */
    public function services(SelectFilter $filter)
    {
        $services = Service::filter($filter)->get();

        return ServiceSelectResource::collection($services);
    }

}
