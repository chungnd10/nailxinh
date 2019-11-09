<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddTypeServiceRequest extends FormRequest
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
               'max:100',
               Rule::unique('type_of_services')->ignore($this->id),
            ] ,
            'description' => 'required|max:300',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ];

        // trường hợp thêm
        if(!$this->id){
            $validate['image']  = 'required|mimes:png,jpg,jpeg';
        }

        return $validate;
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Mục này không được để trống',
            'name.max' => 'Không được vượt quá 100 ký tự',
            'name.unique' => 'Tên đã được sử dụng',
            'image.required' => 'Mục này không được để trống',
            'image.mimes' => 'Chỉ chấp nhận ảnh JPG, JPEG, PNG',
            'description.required' => 'Mục này không được để trống',
            'description.max' => 'Không được vượt quá 300 ký tự',
        ];
    }

}
