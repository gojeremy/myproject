<?php

namespace App\Http\Requests\Admin\Offer;

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
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'urlToImage' => 'nullable|string',
            'url' => 'nullable|string',
            'priority_id' => 'nullable|integer',
            'published' => 'nullable|integer',
            'category' => 'nullable|string',
            'country' => 'nullable|string',
            'language' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'urlToImage.string' => 'Данные должны соответствовать строчному типу',
            'url.string' => 'Данные должны соответствовать строчному типу',
            'priority_id.integer' => 'Данные должны соответствовать строчному типу',
            'published.integer' => 'Данные должны соответствовать строчному типу',
            'category.string' => 'Данные должны соответствовать строчному типу',
            'country.string' => 'Данные должны соответствовать строчному типу',
            'language.string' => 'Данные должны соответствовать строчному типу',
        ];
    }
}
