<?php

namespace Modules\Volunteers\Http\Requests;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('POST')) {
            return $this->createRules();
        } else {
            return $this->updateRules();
        }
    }

    /**
     * Get the create validation rules that apply to the request.
     *
     * @return array
     */
    public function createRules()
    {
        return RuleFactory::make([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:volunteers',
            'phone' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            'dob' => 'required|date',
            'how_know_id' => 'required|exists:reasons,id',
        ]);
    }

    /**
     * Get the update validation rules that apply to the request.
     *
     * @return array
     */
    public function updateRules()
    {
        return RuleFactory::make([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:volunteers,email,' . $this->volunteer->id,
            'phone' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            'dob' => 'required|date',
            'how_know_id' => 'required|exists:reasons,id',
        ]);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make(trans('volunteers::volunteers.attributes'));
    }
}
