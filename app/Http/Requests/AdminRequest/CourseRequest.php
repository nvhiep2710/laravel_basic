<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class CourseRequest extends FormRequest
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
            'course_code' => ['required','max:10'],
            'course_name' => ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'course_code' => 'Mã Khóa học',
            'course_name' => 'Tên khóa học',
        ];
    }
    public function messages()
    {
        return [
            '*.required' => ':attribute không được để trống',
            'course_code.max' => ':attribute không dài quá :max ký tự'
            
        ];
    }
}
