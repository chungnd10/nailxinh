<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'full_name' => 'required|max:100',
            'phone_number' => [
                'required',
                 'regex:/(09|03|07|08|05)+([0-9]{8})$/',
            ],
            'time' => 'required',
            'note' => 'nullable|max:200',
            'branch_id' => 'required',
            'user_id' => 'required',
            'service_id' => 'required',
            'sir' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required'        => '*Mục này không được để trống',
            'full_name.max'             => '*Không được vượt quá 100 ký tự',
            'phone_number.required'     => '*Mục này không được để trống',
            'phone_number.regex'        => '*Số điện thoại sai định dạng',
            'time.required'             => '*Mục này không được để trống',
            'note.max'                  => '*Không được vượt quá 200 ký tự',
            'branch_id.required'        => '*Mục này không được để trống',
            'user_id.required'          => '*Mục này không được để trống',
            'service_id.required'       => '*Mục này không được để trống',
             'sir.required'             => '*Mục này không được để trống',
        ];
    }
}
