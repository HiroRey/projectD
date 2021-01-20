<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [
            'code' => 'required|min:3|max:35|unique:categories,code',
            'name' => 'required|min:3|max:45',
            'description' => 'required|min:3|max:650',
        ];

        if ($this->route()->named('categories.update')) {

            $rules['code'] .= ',' . $this->route()->parameter('category')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
        'required' => 'Поле :attribute, должно быть обязательным к заполнению!',
            'min' => 'В поле :attribute, должно быть минимум :min символов!',
            'max' => 'В поле :attribute, должно быть минимум :max символов!',
        ];
    }
}
