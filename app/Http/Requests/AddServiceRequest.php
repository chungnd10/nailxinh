<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // trường hợp sửa
        $validate = [
            'name'                  => [
               'required',
               'max:100',
               Rule::unique('type_of_services')->ignore($this->id),
            ],
            'price'                 => [
                'required',
                'numeric',
                'between:1,1000000000',
            ],
            'completion_time'       => 'required|max:100',
            'type_of_services_id'   => 'required',
            'description'           => 'nullable|max:300',

        ];

        // trường hợp them
        if (!$this->id){
            $validate['avatar_hidden']        = 'required';
        }

        return $validate;
    }
    
    public function messages()
    {
        return [
            'name.required'                     => '*Mục này không được để trống',
            'name.max'                          => '*Không được vượt quá 100 ký tự',
            'avatar_hidden.required'            => '*Mục này không được để trống',
            'price.required'                    => '*Mục này không được để trống',
            'price.between'                     => '*Yêu cầu giá trị từ 1-1.000.000.000',
            'completion_time.required'          => '*Mục này không được để trống',
            'completion_time.max'               => '*Không được vượt quá 100 ký tự',
            'type_of_services_id.required'      => '*Mục này không được để trống',
            'description.max'                   => '*Không được vượt quá 300 ký tự',
        ];
    }
}
