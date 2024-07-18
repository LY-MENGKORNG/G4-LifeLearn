<?php

namespace App\Http\Requests\Quiz;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class QuizzRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'classroom_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'instructions' => 'nullable|string',
            'points' => 'required|integer',
            'deadline' => 'required|date',
            'topics' => 'required|string|max:255',
            'links' => 'nullable|string',
        ];
    }
}
