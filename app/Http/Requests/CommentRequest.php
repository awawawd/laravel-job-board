<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
        public function rules(): array
    {


        return [
            'author' => 'required|string',
            'content' => 'required|string',
        ];
    }
    public function messages()
    {
        return[
                'author.required' => 'mandatory field',
                'content.required' => 'mandatory field',

        ];
    }
}
