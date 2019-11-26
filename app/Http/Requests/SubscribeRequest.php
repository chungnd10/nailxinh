<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
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
            'email' => [
                    'required',
                    'max:300',
                    'unique:subscribes'
                ]
        ];
    }

    public function messages()
    {
        return [
            'email.required'    => '*Mục này không được để trống',
            'email.max'         => '*Không được vượt quá 300 ký tự',
            'email.unique'      => '*Email này đã được đăng ký trước đây',
        ];
    }
}
