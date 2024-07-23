<?php

namespace App\Http\Requests\Mail;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends DefaultRequest
{ 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|exists:frontusers,email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ];
    }
}
