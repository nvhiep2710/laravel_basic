<?php

namespace App\Http\Requests\AdminRequest;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class ClassRequest extends FormRequest
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
            'class_code' => ['required','max:10'],
            'class_name' => ['required'],
            'start_date' => 'required|date|date_format:Y-m-d|before:end_date',
            'end_date' => 'required|date|date_format:Y-m-d|after:start_date',
            'schedule' => ['required'],
            'id_course' => ['required'],
            'description' => ['required'],
        ];
    }
    public function attributes()
    {
        return [
            'class_code' => 'Mã lớp học',
            'class_name' => 'Tên lớp học',
            'start_date' => 'Ngày bắt đầu',
            'end_date' => 'Ngày kết thúc',
            'schedule' => 'Lịch học',
        ];
    }
    public function messages()
    {
        return [
            '*.required' => ':attribute không được để trống',
            'class_code.max' => ':attribute không dài quá :max ký tự',
            'before' => 'Ngày bắt đầu phải trước ngày kết thúc',
            'after' => 'Ngày kết thúc phải sau ngày bắt đầu',
        ];
    }
}
