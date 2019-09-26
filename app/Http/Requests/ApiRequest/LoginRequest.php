<?php

namespace App\Http\Requests\ApiRequest;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class LoginRequest extends FormRequest
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
            'email' => ['required','email'],
            'password' => ['required'],
            'remember_me' => [],
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
