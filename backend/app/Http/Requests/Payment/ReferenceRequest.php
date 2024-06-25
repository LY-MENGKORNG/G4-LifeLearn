<?php

namespace App\Http\Requests\Payment;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class ReferenceRequest extends DefaultRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "principle_id"=>'required|integer',
            "document_id"=>'required|integer',
            "status"=>'required',
        ];
    }
}
