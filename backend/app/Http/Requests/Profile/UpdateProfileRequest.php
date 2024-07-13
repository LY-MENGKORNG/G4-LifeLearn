<?php

namespace App\Http\Requests\Profile;

use App\Http\Requests\DefaultRequest;

class UpdateProfileRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
        ];
    }
}
