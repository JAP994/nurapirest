<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
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
        return [
            'mantenancedate' => 'required',
            'observation' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mantenancedate.required' => 'Please fill the mantenancedate.',
            'observation.required' => 'Please fill the observation.',
            'description.required' => 'Please fill the description.',
            'image.required' => 'Please fill the image.',
            'user_id.required' => 'Please fill the user_id.'

        ];
    }
}
