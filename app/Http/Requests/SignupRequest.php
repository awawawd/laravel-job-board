<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    // أضف هذه الدالة الضرورية جداً
    public function authorize(): bool
    {
        return true; // غيرها لـ true عشان لارافل يسمح بالطلب
    }

    public function rules(): array
    {
        return [
            'name' => 'bail|required|string',
            'email' => 'bail|required|string|email|unique:users,email', // يفضل تحديد العمود email
            'password' => 'bail|required|string|min:8|confirmed'
        ];
    }
}
