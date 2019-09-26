<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class CountryRequest extends FormRequest
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
            'country_code' => ['required','max:2'],
            'country_name' => ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'country_code' => 'Mã quốc gia',
            'country_name' => 'Tên quốc gia',
        ];
    }
    public function messages()
    {
        return [
            '*.required' => ':attribute không được để trống',
            'country_code.max' => ':attribute không dài quá :max ký tự'
            
        ];
    }
}
