<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoLibraryRequest extends FormRequest
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
            'type_of_service_id' => 'required',
            'display_status_id'  => 'required',
        ];

        //trường hợp thêm
        if (!$this->photo){
            $validate['avatar_hidden']          = 'required';
        }

        return $validate;
    }

    public function messages()
    {
        return [
            'type_of_service_id.required' => '*Mục này không được để trống',
            'display_status_id.required'  => '*Mục này không được để trống',
            'avatar_hidden.required'      => '*Mục này không được để trống',
        ];
    }
}
