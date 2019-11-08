<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSlideRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //trường hợp sửa slide
        $validate = [
            'images'            => 'nullable|mimes:jpg,jpeg,png,gif',
            'url'               => 'nullable|url|max:300',
            'title'             => 'nullable|max:120',
            'description'       => 'nullable|max:200',
            'display_status_id' => 'required',
            'location_display'  => 'required'
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
            'images.required'               => 'Mục này không được để trống',
            'images.mimes'                  => 'Chỉ chấp nhận JPG, JPEG, PNG, GIF',
            'url.url'                       => 'Url sai định dạng',
            'url.max'                       => 'Không được vượt quá 300 ký tự',
            'title.max'                     => 'Không được vượt quá 120 ký tự',
            'description.max'               => 'Không được vượt quá 200 ký tự',
            'location_display.required'     => 'Mục này không được để trống',
            'display_status_id.required'    => 'Mục này không được để trống',
        ];
    }
}
