<?php

namespace App\Http\Requests\AdminRequest;

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
            //login
            'email' => ['required','email'],
            'password' => ['required','min:6'],
            'remember_me' => [],
        ];
    }
    public function attributes()
    {
        return [
            'email' => 'Email',
        ];
    }
    public function messages()
    {
        return [
            '*.required' => ':attribute không được để trống',
            'email' => ':attribute không đúng định dạng',
             '*.min' => ':attribute dài tối thiểu :min ký tự',
        ];
    }
}
