<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddUserRequest extends FormRequest
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
        //trường hợp sửa người dùng
        $validate = [
            'full_name' => 'required|min:5|max:40',
            'phone_number' => [
                'required',
                Rule::unique('users')->ignore($this->id),
                'regex:/(09|03|07|08|05)+([0-9]{8})$/',
            ],
            'birthday' => 'required',
            'address' => 'required|min:5',
            'branch_id' => 'required',
            'role_id' => 'required',
            'gender_id' => 'required',
        ];

        //trường hợp thêm người dùng
        if (!$this->id){
            $validate['email']  = 'required|unique:users,email';
            $validate['password']  = 'required|min:6|max:40';
            $validate['cf_password']  = 'required|same:password';
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Mục này không được để trống',
            'full_name.min' => 'Yêu cầu từ 5-40 ký tự',
            'full_name.max' => 'Yêu cầu từ 5-40 ký tự',
            'phone_number.required' => 'Mục này không được để trống',
            'phone_number.regex' => 'Số điện thoại sai định dạng',
            'phone_number.unique' => 'Số điện thoại đã được sử dụng',
            'birthday.required' => 'Mục này không được để trống',
            'address.required' => 'Mục này không được để trống',
            'address.min' => 'Yêu cầu tối thiểu 5 ký tự',
            'password.required' => 'Mục này không được để trống',
            'password.min' => 'Yêu cầu từ 6-40 ký tự',
            'password.max' => 'Yêu cầu từ 6-40 ký tự',
            'cf_password.required' => 'Mục này không được để trống',
            'cf_password.same' => 'Nhập lại mật khẩu không đúng',
            'email.required' => 'Mục này không được để trống',
            'email.unique' => 'Email đã được sử dụng',
            'branch_id.required' => 'Mục này không được để trống',
            'role_id.required' => 'Mục này không được để trống',
            'gender_id.required' => 'Mục này không được để trống',
        ];
    }
}
