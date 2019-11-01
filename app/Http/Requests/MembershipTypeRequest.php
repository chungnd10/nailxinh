<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipTypeRequest extends FormRequest
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
            'title' => 'required|min:1|max:100',
            'description' => 'nullable|min:10|max:200',
            'money_level' => 'required|numeric|between:0,1000000000',
            'discount_level' => 'required|numeric|between:0,100'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Mục này không đươc để trống',
            'title.min' => 'Yêu cầu từ 10-100 ký tự',
            'title.max' => 'Yêu cầu từ 10-100 ký tự',
            'description.min' => 'Yêu cầu từ 10-200 ký tự',
            'description.max' => 'Yêu cầu từ 10-200 ký tự',
            'money_level.required' => 'Mục này không đươc để trống',
            'money_level.between' => 'Yêu cầu giá trị từ 0 - 1.000.000.000',
            'money_level.numeric' => 'Vui lòng nhập số',
            'discount_level.required' => 'Mục này không đươc để trống',
            'discount_level.between' => 'Yêu cầu giá trị từ 0-100',
            'discount_level.numeric' => 'Vui lòng nhập số',
        ];
    }
}
