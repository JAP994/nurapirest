<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonorRequest extends FormRequest
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
            'name' => 'required',
            'lastname' => 'required',
            'ci' => 'required',
            'username' => 'required',
            'password' => 'required',
            'image' => 'required'
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
            'name.required' => 'Please fill the name.',
            'lastname.required' => 'Please fill the lastname.',
            'ci.required' => 'Please fill the ci.',
            'username.required' => 'Please fill the username.',
            'password.required' => 'Please fill the password.',
            'image.required' => 'Please fill the image.'
        ];
    }
}
