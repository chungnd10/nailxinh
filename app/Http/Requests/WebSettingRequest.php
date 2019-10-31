<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSettingRequest extends FormRequest
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
            'phone_number' => [
                'required',
                'regex:/(09|02|03|07|08|05)+([0-9]{8})$/',
            ],
            'email' => [
              'required',
              'regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/'
            ],
            'open_time' => 'required',
            'close_time' => 'required',
            'avatar' => [
                'mimes:jpg,jpeg,png,gif'
            ]

        ];
    }

    public function messages()
    {
        return [
            'phone_number.required' => 'Mục này không được để trống',
            'phone_number.regex' => 'Số điện thoại sai định dạng',
            'phone_number.unique' => 'Số điện thoại đã được sử dụng',
            'email.required' => 'Mục này không được để trống',
            'email.regex' => 'Email sai định dạng',
            'open_time.required' => 'Mục này không được để trống',
            'close_time.required' => 'Mục này không được để trống',
            'avatar.mimes' => 'Chỉ chấp nhận JPG, JPEG, PNG, GIF'
        ];
    }
}
