<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'code' => 'required|min:3|max:35|unique:products,code',
            'name' => 'required|min:3|max:45',
            'description' => 'required|min:3|max:650',
            'price' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:0',
        ];

        if ($this->route()->named('products.update')) {

            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле :attribute, должно быть обязательным к заполнению!',
            'min' => 'В поле :attribute, должно быть минимум :min символов!',
            'max' => 'В поле :attribute, должно быть минимум :max символов!',
        ];
    }
}
