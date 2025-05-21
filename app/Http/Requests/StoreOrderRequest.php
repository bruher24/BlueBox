<?php

namespace App\Http\Requests;

use App\Enums\StatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
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
            'client_name' => 'required|string|max:60',
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'comment' => 'string|nullable|max:500',
            'status' => ['required', Rule::enum(StatusEnum::class)],
        ];
    }

    public function prepareForValidation()
    {
        $this->request->set('client_name', preg_replace('/\s+/', ' ', $this->request->get('client_name')));
    }

    public function messages()
    {
        return [
            'client_name.required' => 'Поле "ФИО" обязательно для ввода!',
            'client_name.max' => '"ФИО" не должно превышать :max символов!',
            'product_id.required' => 'Поле "Товар" обязательно для ввода!',
            'comment.max' => '"Комментарий" не должен превышать :max сиволов!',
        ];
    }
}
