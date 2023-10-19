<?php

namespace App\Http\Requests\Admin\Offer;

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
            'title' => 'required|string',
            'content' => 'nullable|string',
            'urlToImage' => 'nullable|file',
            'url' => 'nullable|string',
            'priority_id' => 'nullable|integer',
            'category' => 'nullable|string',
            'country' => 'nullable|string',
            'language' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'urlToImage.required' => 'Это поле необходимо для заполнения',
            'urlToImage.file' => 'Данные должны соответствовать строчному типу',
            'url.string' => 'Данные должны соответствовать строчному типу',
            'priority_id.integer' => 'Данные должны соответствовать строчному типу',
            'category.required' => 'Это поле необходимо для заполнения',
            'category.string' => 'Данные должны соответствовать строчному типу',
            'country.string' => 'Данные должны соответствовать строчному типу',
            'language.string' => 'Данные должны соответствовать строчному типу',
        ];
    }
}
