<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // dozvoljavamo prolaz zahtjeva
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|min:3|max:255|unique:products',
            'description' => 'required|string|min:3|max:500',
            'amount'      => 'required|integer|min:1|max:9999',
            'price'       => 'required|numeric|min:0.1|max:99999',
            'image'       => 'required|string|max:255',
        ];
    }
}
