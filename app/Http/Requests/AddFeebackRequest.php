<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFeebackRequest extends FormRequest
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
            'content'       => 'required|max:300',
            'full_name'     => 'required|max:100',
        ];

        //trường hợp thêm
        if (!$this->id){
            $validate['avatar_hidden']        = 'required';
        }
        return $validate;
    }

    public function messages()
    {
        return [
            'avatar_hidden.required'            => '*Mục này không được để trống',
            'full_name.required'                => '*Mục này không được để trống',
            'full_name.max'                     => '*Không được vượt quá 100 ký tự',
            'content.required'                  => '*Mục này không được để trống',
            'content.max'                       => '*Không được vượt quá 300 ký tự',
        ];
    }
}
