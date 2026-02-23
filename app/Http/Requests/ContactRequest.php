<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'       => 'required|email|max:255|unique:contact,email',
            'subject'     => 'required|string|min:3|max:100',
            'message' => 'required|string|min:3|max:500',
        ];
    }
}
