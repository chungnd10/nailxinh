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
        //trường hợp sửa slide
        $validate = [
            'images' => 'nullable|mimes:jpg,jpeg,png,gif',
            'title' => 'nullable|min:10|max:80',
            'content' => 'nullable|min:10|max:600',
        ];

        return $validate;
    }

    public function messages()
    {
        return [
            'images.mimes' => 'Chỉ chấp nhận JPG, JPEG, PNG, GIF',
            'title.min' => 'Yêu cầu từ 10-80 ký tự',
            'title.max' => 'Yêu cầu từ 10-80 ký tự',
            'content.min' => 'Yêu cầu từ 100-600 ký tự',
            'content.max' => 'Yêu cầu từ 100-600 ký tự',
        ];
    }
}
