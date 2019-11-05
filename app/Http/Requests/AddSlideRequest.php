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
            'title' => 'nullable|max:120',
            'description' => 'nullable|max:200',
        ];

        //trường hợp thêm slide
        if (!$this->id)
        {
            $validate['images'] = 'required|mimes:jpg,jpeg,png,gif';
            $validate['display_status_id'] = 'required';
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
            'title.max' => 'Không được vượt quá 120 ký tự',
            'description.max' => 'Không được vượt quá 200 ký tự',
        ];
    }
}
