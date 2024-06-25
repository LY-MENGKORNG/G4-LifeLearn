<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\DefaultRequest;

class FrontRegisterRequest extends DefaultRequest
{    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
    */
   public function rules(): array
   {
       return [
           'first_name' => 'required|string',
           'last_name' => 'required|string',
           'email' => 'required|email|unique:frontusers',
           'password' => 'required|min:6',
           'phone' => 'string',
           'profile' => 'mimes:jpeg,jpg,png,gif|max:10000'
       ];
   }
}
