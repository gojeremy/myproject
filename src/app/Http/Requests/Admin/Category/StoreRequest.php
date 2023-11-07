<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'idName' => 'required|string',
            'priority_num' => 'required|integer',
            'published' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'idName.required' => 'Это поле необходимо для заполнения',
            'idName.string' => 'Данные должны соответствовать строчному типу',
            'priority_num.integer' => 'Данные должны соответствовать строчному типу',
            'priority_num.required' => 'Это поле необходимо для заполнения',
            'published.integer' => 'Данные должны соответствовать строчному типу',
            'published.required' => 'Это поле необходимо для заполнения',
        ];
    }
}
