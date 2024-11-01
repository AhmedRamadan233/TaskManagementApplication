<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $titleId = $this->input('id') ?? 'NULL';
        return [
            'id' => 'nullable|integer|exists:tasks,id',
            'title' => 'required|string|max:255|unique:tasks,title,' . $titleId,
            'description' => 'nullable|string',
            'status' => 'required|in:pending,completed',
        ];
    }
}
