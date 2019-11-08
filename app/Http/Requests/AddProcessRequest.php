<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProcessRequest extends FormRequest
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
            'type_of_services_id' => 'required|numeric',
            'name' => 'required|min:1|max:100',
            'step' => 'numeric|between:1,100',
            'content' => 'nullable|max:200',
        ];

        if (!$this->id) {
            $validate['content'] = 'required|max:200';
        }
        return $validate;
    }

    public function messages()
    {
        return [
            'type_of_services_id.required' => 'Không để trống mục này',
            'type_of_services_id.numeric' => 'ID không đúng định dạng',
            'name.required' => 'Không để trống mục này',
            'name.min' => 'Yêu cầu từ 1-100 ký tự',
            'name.max' => 'Yêu cầu từ 1-100 ký tự',
            'step.min' => 'Yêu cầu giá trị từ 1 - 100',
            'step.max' => 'Yêu cầu giá trị từ 1 - 100',
            'step.numeric' => 'Yêu cầu nhập số',
            'content.required' => 'Không để trống mục này',
            'content.max' => 'Không được vượt quá 200 ký tự'

        ];
    }
}
