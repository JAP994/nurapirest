<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
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
            'latitude' => 'required',
            'longitude' => 'required',
            'collected' => 'required',
            'image' => 'required',
            'description' => 'required',
            'delivery_id' => 'required',
            'maintenance_id' => 'required',
            'collected_id' => 'required',
            'donor_id' =>'required',
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
            'latitude.required' => 'Please fill the latitude.',
            'longitude.required' => 'Please fill the longitude.',
            'collected.required' => 'Please fill the collected.',
            'image.required' => 'Please fill the image.',
            'description.required' => 'Please fill the description.',
            'delivery_id.required' => 'Please fill the delivery_id.',
            'maintenance_id.required' => 'Please fill the maintenance_id.',
            'collected_id.required' => 'Please fill the collected_id.',
            'donor_id.required' =>'Please fill the donor_id.',
        ];
    }
}
