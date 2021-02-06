<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectedRequest extends FormRequest
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
            'pickupdate' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
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
            'pickupdate.required' => 'Please fill the pickupdate.',
            'latitude.required' => 'Please fill the latitude.',
            'longitude.required' => 'Please fill the longitude.',
            'image.required' => 'Please fill the image.',
            'user_id.required' => 'Please fill the user_id.' 
        ];
    }
}
