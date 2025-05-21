<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:40|unique:products,name, ' . $this->request->get('product_id'),
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'description' => 'string|nullable|max:500',
            'price' => 'required|decimal:0,2|min:0.1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" обязательно для ввода!',
            'name.max' => 'Поле "Название" не должно превышать :max символов!',
            'category_id.required' => 'Поле "Категория" обязательно для ввода!',
            'price.required' => 'Поле "Цена" обязательно для ввода!',
        ];
    }
}
