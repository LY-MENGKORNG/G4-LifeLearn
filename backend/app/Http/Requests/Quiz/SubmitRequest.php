<?php

namespace App\Http\Requests\Quiz;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class SubmitRequest extends DefaultRequest
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
            'assignment_id' => 'required|integer',
            'work' => 'required',
        ];
    }
}
