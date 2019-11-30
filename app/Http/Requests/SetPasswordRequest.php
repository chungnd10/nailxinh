<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetPasswordRequest extends FormRequest
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
            'password' => 'required|min:8|max:40',
            'cf_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'password.required'         => '*Mục này không được để trống',
            'password.min'              => '*Yêu cầu từ 8-40 ký tự',
            'password.max'              => '*Yêu cầu từ 8-40 ký tự',
            'cf_password.required'      => '*Mục này không được để trống',
            'cf_password.same'          => '*Nhập lại mật khẩu không đúng',
        ];
    }
}
