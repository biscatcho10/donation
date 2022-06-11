<?php

namespace Modules\Volunteers\Http\Controllers;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Routing\Controller;
use Modules\Volunteers\Entities\Field;
use Modules\Volunteers\Http\Filters\SelectFilter;
use Modules\Volunteers\Transformers\FieldsSelectResource;

class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SelectFilter $filter
     * @return AnonymousResourceCollection
     */
    public function fields(SelectFilter $filter)
    {
        $fields = Field::filter($filter)->get();

        return FieldsSelectResource::collection($fields);
    }


}
