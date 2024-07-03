<?php

namespace App\Http\Requests\Favorites;

use App\Http\Requests\DefaultRequest;
use Illuminate\Foundation\Http\FormRequest;

class MylearnRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book_id' => 'required|exists:books,id',
        ];
    }
}
