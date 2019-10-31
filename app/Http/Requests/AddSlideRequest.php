<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSlideRequest extends FormRequest
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
            'url' => 'nullable|url',
            'display_status_id' => 'required',
            'title' => 'nullable|min:10|max:25',
            'description' => 'nullable|min:10|max:130',
        ];

        //trường hợp thêm slide
        if (!$this->id)
        {
            $validate['images'] = 'required|mimes:jpg,jpeg,png,gif';
        }
        return $validate;
    }

    public function messages()
    {
        return [
            'images.required' => 'Mục này không được để trống',
            'images.mimes' => 'Chỉ chấp nhận JPG, JPEG, PNG, GIF',
            'url.url' => 'Url sai định dạng',
            'display_status_id' => 'Mục này không được để trống',
            'title.min' => 'Yêu cầu từ 10-25 ký tự',
            'title.max' => 'Yêu cầu từ 10-25 ký tự',
            'description.min' => 'Yêu cầu từ 10-130 ký tự',
            'description.max' => 'Yêu cầu từ 10-130 ký tự',
        ];
    }
}
