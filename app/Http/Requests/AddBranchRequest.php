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
            'name' => [
                'required',
                Rule::unique('branches')->ignore($this->id),
            ],
            'phone_number' => [
                'required',
                Rule::unique('branches')->ignore($this->id),
                'regex:/(09|03|07|08|05)+([0-9]{8})$/',
            ],
            'city_id' => 'required',
            'address' => [
                'required',
                'min:5',
                Rule::unique('branches')->ignore($this->id),
            ]
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'name.required' => 'Mục này không được để trống',
            'name.unique' => 'Tên đã được sử dụng',
            'phone_number.required' => 'Mục này không được để trống',
            'phone_number.unique' => 'Số điện thoại đã được sử dụng',
            'phone_number.regex' => 'Số điện thoại sai định dạng',
            'city_id.required' => 'Mục này không được để trống',
            'address.required' => 'Mục này không được để trống',
            'address.min' => 'Yêu cầu tối thiểu 5 ký tự',
            'address.unique' => 'Địa chỉ đã được sử dụng'
        ];
    }
}
