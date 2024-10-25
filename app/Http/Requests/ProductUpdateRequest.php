<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product')->id; // Correctly reference the product

        return [
            'name' => [
                'nullable',
                'string',
                Rule::unique('products', 'name')->ignore($productId),
            ],
            'category' => 'nullable|string',
            'active_ingredients' => 'nullable|string',
            'research_status' => 'nullable|string|in:Approved,In Development,Experimental',
            'batch_number' => [
                'nullable',
                'string',
                'regex:/^[a-zA-Z]{2}-[0-9]{3}-[0-9]{2}-[0-9]{1}$/',
                Rule::unique('products', 'batch_number')->ignore($productId),
            ],
            'manufacturing_date' => 'nullable|date|before_or_equal:today',
            'expiration_date' => 'nullable|date|after:manufacturing_date',
        ];
    }
}
