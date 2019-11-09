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
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'content' => 'required|max:300',
            'full_name' => 'required|max:100',
        ];

        //trường hợp thêm

        if (!$this->id) {
            $validate['image'] = 'required|mimes:png,jpg,jpeg';
        }
        return $validate;
    }

    public function messages()
    {
        return [
            'image.required'        => 'Mục này không được để trống',
            'image.mimes'           => 'Chỉ chấp nhận ảnh PNG, JPG, JPEG',
            'full_name.required'    => 'Mục này không được để trống',
            'full_name.max'         => 'Không được vượt quá 100 ký tự',
            'content.required'      => 'Mục này không được để trống',
            'content.max'           => 'Không được vượt quá 300 ký tự',
        ];
    }
}
