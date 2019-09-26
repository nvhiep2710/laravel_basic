<?php

namespace App\Http\Requests\ApiRequest;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class RegisterRequest extends FormRequest
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
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'email' => ['required','email','unique:students'],
            'password' => ['required','min:6','confirmed'],
            'address' => ['required'],
        ];
    }
    public function attributes()
    {
        return [
           
        ];
    }
    public function messages()
    {
        return [
           
        ];
    }
}
