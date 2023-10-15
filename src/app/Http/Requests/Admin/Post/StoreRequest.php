<?php

namespace App\Http\Requests\Admin\Post;

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
            'description' => 'required|string',
            'content' => 'required|string',
            'author' => 'required|string',
            'source_id' => 'nullable|string',
            'source_name' => 'nullable|string',
            'urlToImage' => 'required|string',
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
            'description.required' => 'Это поле необходимо для заполнения',
            'description.string' => 'Данные должны соответствовать строчному типу',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Данные должны соответствовать строчному типу',
            'author.required' => 'Это поле необходимо для заполнения',
            'author.string' => 'Данные должны соответствовать строчному типу',
            'source.required' => 'Это поле необходимо для заполнения',
            'source.string' => 'Данные должны соответствовать строчному типу',
            'urlToImage.required' => 'Это поле необходимо для заполнения',
            'urlToImage.string' => 'Данные должны соответствовать строчному типу',
            'url.required' => 'Это поле необходимо для заполнения',
            'url.string' => 'Данные должны соответствовать строчному типу',
            'priority_id.nullable' => 'Это поле необходимо для заполнения',
            'priority_id.integer' => 'Данные должны соответствовать integer типу',
            'category.nullable' => 'Это поле необходимо для заполнения',
            'category.string' => 'Данные должны соответствовать строчному типу',
            'country.nullable' => 'Это поле необходимо для заполнения',
            'country.string' => 'Данные должны соответствовать строчному типу',
            'language.nullable' => 'Это поле необходимо для заполнения',
            'language.string' => 'Данные должны соответствовать строчному типу',
        ];
    }
}
