<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'idName' => 'nullable|string',
            'priority_num' => 'nullable|integer',
            'published' => 'nullable|integer',

        ];
    }
    public function messages()
    {
        return [
            'name.string' => 'Данные должны соответствовать строчному типу',
            'idName.string' => 'Данные должны соответствовать строчному типу',
            'priority_num.integer' => 'Данные должны соответствовать строчному типу',
            'published.integer' => 'Данные должны соответствовать строчному типу',

        ];
    }
}
