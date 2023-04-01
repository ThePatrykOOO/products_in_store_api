<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'shop_id' => ['required', 'integer', 'exists:shops,id'],
            'ean' => ['required', 'numeric'],
            'sku' => ['required', 'string', 'max:255'],
            'product_groups_ids' => ['nullable', 'array'],
            'product_groups_ids.*' => ['required', 'integer', 'exists:products,id'],
        ];
    }
}
