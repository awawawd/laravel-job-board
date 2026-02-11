<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'email' => 'bail|required|string|email', // يفضل تحديد العمود email
            'password' => 'bail|required|string'
        ];
    }
}
