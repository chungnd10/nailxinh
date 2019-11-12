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
            'title'                 => 'required|max:100',
            'description'           => 'nullable|max:200',
            'money_level'           => 'required|numeric|between:0,1000000000',
            'discount_level'        => 'required|numeric|between:0,100'
        ];
    }

    public function messages()
    {
        return [
            'title.required'            => '*Mục này không được để trống',
            'title.max'                 => '*Không được vượt quá 100 ký tự',
            'description.max'           => '*Không được vượt quá 200 ký tự',
            'money_level.required'      => '*Mục này không đươc để trống',
            'money_level.between'       => '*Yêu cầu giá trị từ 0 - 1.000.000.000',
            'money_level.numeric'       => '*Yêu cầu nhập số',
            'discount_level.required'   => '*Mục này không đươc để trống',
            'discount_level.between'    => '*Yêu cầu giá trị từ 0-100',
            'discount_level.numeric'    => '*Yêu cầu nhập số',
        ];
    }
}
