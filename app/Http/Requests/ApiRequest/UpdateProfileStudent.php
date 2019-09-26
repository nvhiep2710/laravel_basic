<?php

namespace App\Http\Requests\ApiRequest;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class UpdateProfileStudent extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'string',
            'phone' => 'string',
            'avatar' => 'mimes:jpeg,png,jpg|max:2048',
        ];
    }
    public function messages()
    {
        return [];
    }
}
