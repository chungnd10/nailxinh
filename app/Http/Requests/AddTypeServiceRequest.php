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
        $validate = [
            'name'          => [
               'required',
               'max:100',
               Rule::unique('type_of_services')->ignore($this->id),
            ] ,
            'description'   => 'required|max:300',
        ];

        if (!$this->id){
            $validate['avatar_hidden']        = 'required';
        }

        return $validate;
    }
    
    public function messages()
    {
        return [
            'name.required'             => '*Mục này không được để trống',
            'name.max'                  => '*Không được vượt quá 100 ký tự',
            'name.unique'               => '*Tên đã được sử dụng',
            'avatar_hidden.required'    => '*Mục này không được để trống',
            'description.required'      => '*Mục này không được để trống',
            'description.max'           => '*Không được vượt quá 300 ký tự',
        ];
    }

}
