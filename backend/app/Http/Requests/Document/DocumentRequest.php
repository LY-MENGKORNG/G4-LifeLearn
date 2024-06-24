<?php

namespace App\Http\Requests\Document;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends DefaultRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

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
