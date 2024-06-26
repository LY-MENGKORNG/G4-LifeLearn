<?php

namespace App\Http\Requests\Payment;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "school_name"=>'required|string|',
            "school_address"=>'required|string',
            "school_phone_number"
        ];
    }
}
