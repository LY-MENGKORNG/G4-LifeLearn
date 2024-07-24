<?php

namespace App\Http\Requests\Classroom;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'grade_id' => 'required|integer',
            'class_name' => 'required|string',
            'description' => 'required|string|max:20',
        ];
    }
}
