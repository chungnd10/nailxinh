<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddBranchRequest extends FormRequest
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
        //trường hợp sửa
        $validate = [
            'name'              => [
                'required',
                'max:100',
                Rule::unique('branches')->ignore($this->id),
            ],
            'phone_number'      => [
                'required',
                'max:11',
                Rule::unique('branches')->ignore($this->id),
                'regex:/(09|03|07|08|05)+([0-9]{8})$/',
            ],
            'city_id'           => 'required|numeric',
            'address'           => [
                'required',
                'min:5',
                'max:200',
                Rule::unique('branches')->ignore($this->id),
            ]
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'name.required'             => '*Mục này không được để trống',
            'name.unique'               => '*Tên đã được sử dụng',
            'name.max'                  => '*Không được vượt quá 100 ký tự',
            'phone_number.required'     => '*Mục này không được để trống',
            'phone_number.unique'       => '*Số điện thoại đã được sử dụng',
            'phone_number.regex'        => '*Số điện thoại sai định dạng',
            'phone_number.max'          => '*Không được vượt quá 11 ký tự',
            'city_id.required'          => '*Mục này không được để trống',
            'city_id.numeric'           => '*ID không đúng định dạng',
            'address.max'               => '*Không được vượt quá 200 ký tự',
            'address.required'          => '*Mục này không được để trống',
            'address.min'               => '*Yêu cầu tối thiểu 5 ký tự',
            'address.unique'            => '*Địa chỉ đã được sử dụng'
        ];
    }
}
