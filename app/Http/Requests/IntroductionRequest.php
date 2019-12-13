<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IntroductionRequest extends FormRequest
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
            'title'         => 'required|max:300',
            'content'       => 'required|max:3000',
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'title.required'        => "*Mục này không được để trống",
            'title.max'             => '*Không được vượt quá 300 ký tự',
            'content.required'      => "*Mục này không được để trống",
            'content.max'           => '*Không được vượt quá 3000 ký tự',
        ];
    }
}
