<?php

namespace Modules\Volunteers\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Modules\Countries\Entities\Country */
class FieldsSelectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->name,
        ];
    }
}
