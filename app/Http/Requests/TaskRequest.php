<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Task validation request
 */
class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Правила валідації для полів задачі
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,in_progress,completed',
            'priority' => 'required|integer|min:1|max:5',
            'due_date' => 'nullable|date'
        ];
    }

    /**
     * Get custom messages for validator errors
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        // Кастомні повідомлення для помилок валідації
        return [
            'title.required' => 'Поле назви завдання є обов\'язковим',
            'title.max' => 'Назва завдання не повинна перевищувати 255 символів',
            'status.in' => 'Вибрано невірний статус завдання',
            'priority.min' => 'Пріоритет повинен бути щонайменше 1',
            'priority.max' => 'Пріоритет не повинен перевищувати 5',
            'due_date.date' => 'Дата повинна бути у правильному форматі'
        ];
    }
}
