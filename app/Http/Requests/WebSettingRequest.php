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
            'phone_number'      => [
                'required',
                'regex:/(09|03|07|08|05)+([0-9]{8})$/',
                'max:11'
            ],
            'email'             => [
              'required',
              'regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/',
              'max:200'
            ],
            'open_time'         => 'required|max:50',
            'close_time'        => 'required|max:50',
            'avatar'            => [
                'mimes:jpg,jpeg,png,gif',
                'max:2048'
            ],
            'address'           => 'required|max:200',
            'facebook'          => 'required|max:300',
            'introduction'      => 'required|max:200'

        ];
    }

    public function messages()
    {
        return [
            'phone_number.required'     => '*Mục này không được để trống',
            'phone_number.regex'        => '*Số điện thoại sai định dạng',
            'phone_number.unique'       => '*Số điện thoại đã được sử dụng',
            'phone_number.max'          => '*Không được vượt quá 11 ký tự',
            'email.required'            => '*Mục này không được để trống',
            'email.regex'               => '*Email không đúng định dạng',
            'email.max'                 => '*Không được vượt quá 200 ký tự',
            'open_time.required'        => '*Mục này không được để trống',
            'open_time.max'             => '*Không được vượt quá 50 ký tự',
            'close_time.required'       => '*Mục này không được để trống',
            'close_time.max'            => '*Không được vượt quá 50 ký tự',
            'avatar.mimes'              => '*Chỉ chấp nhận JPG, JPEG, PNG, GIF',
            'avatar.max'                => '*Kích thước ảnh không được vượt quá 2MB',
            'facebook.required'         => '*Mục này không được để trống',
            'facebook.max'              => '*Không được vượt quá 300 ký tự',
            'address.required'          => '*Mục này không được để trống',
            'address.max'               => '*Không được vượt quá 200 ký tự',
            'introduction.required'     => '*Mục này không được để trống',
            'introduction.max'          => '*Không được vượt quá 200 ký tự'

        ];
    }
}
