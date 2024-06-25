<?php

namespace App\Http\Requests\Payment;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends DefaultRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "method"=>'required|string',
            "amount"=>'required|integer',
            "course_id"=>'required|integer',
            "system_id"=>'required|integer',
        ];
    }
}
