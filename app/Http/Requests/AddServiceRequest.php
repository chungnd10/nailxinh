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
        // trường hợp sửa
        $validate = [
            'name' => [
               'required',
               'max:80',
               Rule::unique('type_of_services')->ignore($this->id),
            ],
            'price' => 'required|numeric|between:1,1000000000',
            'completion_time' => 'required',
            'type_of_services_id' => 'required'
        ];

        // trưởng hợp thêm
        if (!$this->id){
            $validate['image']  = 'required|mimes:png,jpg,jpeg';
        }

        return $validate;
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Mục này không được để trống',
            'name.max' => 'Không được vượt quá 80 ký tự',
            'image.required' => 'Mục này không được để trống',
            'image.mimes' => 'Chỉ chấp nhận ảnh JPG, JPEG, PNG',
            'price.required' => 'Mục này không được để trống',
            'price.between' => 'Yêu cầu giá trị từ 1-1.000.000.000',
            'completion_time.required' => 'Mục này không được để trống',
            'type_of_services_id.required' => 'Mục này không được để trống',
        ];
    }
}
