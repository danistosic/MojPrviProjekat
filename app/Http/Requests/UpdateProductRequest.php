<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:500',
            'amount'      => 'required|integer|min:0|max:99999',
            'price'       => 'required|numeric|min:0.1|max:99999',
            'image'       => 'nullable|string|max:255',
        ];
    }
}
