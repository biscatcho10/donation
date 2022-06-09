<?php

namespace Modules\HowKnow\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\HowKnow\Entities\Reason;
use Modules\HowKnow\Http\Filters\SelectFilter;
use Modules\HowKnow\Transformers\ReasonSelectResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return AnonymousResourceCollection
     */
    public function reasons(SelectFilter $filter)
    {
        $countries = Reason::filter($filter)->get();

        return ReasonSelectResource::collection($countries);
    }


}
