<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class AddServiceRequest extends FormRequest
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
            'name' => 'required|min:5|max:40',
            'slug' => [
                'required',
                Rule::unique('services')->ignore($this->id),
                'regex:/^[a-z0-9-]*$/'
            ]
        ];

        //trường hợp thêm người dùng
        if (!$this->id){

            $validate['image']  = 'required|mimes:png,jpg,jpeg';
        }

        return $validate;
    }
    public function messages()
    {
        return [
            'name.required' => 'Mục này không được để trống',
            'name.min' => 'Yêu cầu từ 5-40 ký tự',
            'name.max' => 'Yêu cầu từ 5-40 ký tự',
            'image.required' => 'Mục này không được để trống',
            'image.mimes' => 'Chỉ chấp nhận ảnh JPG, JPEG, PNG',
            'slug.required' => 'Mục này không được để trống',
            'slug.regex' => 'Đường dẫn chỉ chứa các chứ, số và dấu -',
            'slug.unique' => 'Đường dẫn này đã tồn tại'
        ];
    }
}
